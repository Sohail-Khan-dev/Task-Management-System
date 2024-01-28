<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Rule;

class TaskManager extends Component
{
    // Property rules are not suitable for the livewire . you can crate a protected Property for Rule and Messages
    // #[Rule('required', 'string', 'max:50')]
    public $title ,  $status = 'todo';
    // #[Rule('required','min:10')]
    public $description;
    public $user_id = 0; 

    public $isModalOpen = false;
    public $isEditMode, $showDataInModal = false;
    public $taskUpdate;
    // I try to use above variable but there was in issue in using this. So i create new Variable and it worked
    public $showtask;

    // All Users will get from User table and storein below Variable 
    public $users;
    // This user will be used to Show only Tasks related to that User 
    public $user = null;

    protected $rules = [
        'title' => 'required|string|max:50',
        'description' => 'required|min:10',
        'status' => 'required',
        'user_id' => 'required',
    ];
    protected $messages = [
        'title.required' => 'Title is required',
        'title.max' => 'Title must be less than 50 characters',
        'description.required' => 'Description is required',
        'description.min' => 'Description must be at least 10 characters',
        'status.required' => 'Status is required',
    ];

    public function mount(){
        $this->users = User::all() ?? collect();
    }

    public function createTask()
    {
        $this->openModal();
    }
    public function store(){
       $validateData = $this->validate();
        Task::create($validateData);
        $this->closeModal();
    }
    public function closeModal(){
        $this->resetExcept(['users']);
        $this->isModalOpen = false;
    }
    public function openModal(){
        $this->resetExcept(['users']);
        $this->resetErrorBag();
        $this->isModalOpen = true;
    }

    public function updated($field){
        // Thsi is called when all fields are filled but if use use ValidateOnly then it is called on each update
        // $this->validate();
        $this->validateOnly($field, [
           'title'=> ['required', 'max:30'] ,
           'description'=> ['required', 'min:10'] ,
           'status'=> ['required'] ,
           'user_id'=> ['required']
        ]);
       
    }
  
    public function delete(Task $task){
        $task->delete();
    }   
    public function edit(Task $task){
        // dd('Edit Task '.$task);
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->isModalOpen = true;
        $this->isEditMode = true;
        $this->taskUpdate = $task;
        $this->user_id = $task->user_id;
    }
    public function update(){
        // dd('Task Updated : ' . $this->task);
        $validateData = $this->validate();
        $this->taskUpdate->update($validateData);
        $this->closeModal();
        $this->isEditMode = false; 
    }
    public function showTask(Task $task){
        $this->showtask = $task;
        $this->showDataInModal = true;
        // dd('show Task ' . $this->showtask); 
    }
    public function hideTask(){
        $this->showDataInModal = false;
    }
    public function searchUserTask($user){
        if($this->user != null)
            $this->user = null;
        else 
            $this->user = $user;
    }
    public function render()
    {
        if($this->user) {
            // dd($this->user);
            $tasks = Task::where('user_id', $this->user)->get();
        } else {
            $tasks = Task::all();
        }
        return view('livewire.task-manager',[
            'tasks' => $tasks
        ]);
    }


}
