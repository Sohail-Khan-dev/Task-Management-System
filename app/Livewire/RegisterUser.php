<?php
namespace App\Livewire;
use Livewire\Component;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use  Illuminate\Validation\Validator;
class RegisterUser extends Component
{
    public $name, $email, $username,$role, $password, $verifypassword;
    public $isEditRequest = false;
    // Make Below user Public to work with them if we make it private the nit will no work. 
    public ?User $user = null;
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'string', 'max:30', 'unique:users,username'],
            'role' => ['required', 'string', 'max:30'],
            'password' => ['required', 'min:5'],
            'verifypassword' => ['same:password'],
        ]);
    }

    public function register()
    {
        $validatedData = $this->validate([
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'string', 'max:30', 'unique:users,username'],
            'role' => ['required', 'string', 'max:10'],
            'password' => ['required', 'min:5'],
            'verifypassword' => ['required', 'min:5','same:password'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        $this->reset();
        // Redirect or inform the user of successful registration
       $this->redirect('/users');
        // $this->redirect(Taskcontroller::class);
    }
    public function updateUser(){
        // dd('User value is : ' . $this->user->name);
        if(! $this->user)
        {
            dd('User have Null Value WE should fix this befor moving forward');
            return;
        }
        $validData = $this->validate([
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'username' => ['required', 'string', 'max:30', 'unique:users,username,'. $this->user->id],
            'role' => ['required', 'string', 'max:30'],
            'password' => ['required', 'min:5,'. $this->user->id],
            'verifypassword' => ['required','same:password', 'min:5,'. $this->user->id],
        ]);
        //Only Hash and Set the Pasword if it is changed 
        if(!empty($validData['password'])){
            $validData['password'] = Hash::make($validData['password']);
        }else { 
            // Remove teh Password Validation as password is no set
            unset($validData['password']);
        }
        // Update the User with the Validate Data 
        $this->user->update($validData);
        // Remove the Edit flag 
        // $this->isEditRequest = false; // the reset Function below reset all public properties
        $this->reset();
        $this->redirect('/users');
    }
    public function mount(User $user = null) {
        // in Below condition if we user $user only then we are getting [] instead of null
        if($user->id !== null){
            $this->user = $user;
            $this->isEditRequest = true;
            $this->edit($user);
        }else
        {
            $this->isEditRequest = false;
            $this->role = 'Guest';
            // dd('Value is set to False');
        }
    }

    public function edit(User $user){
        $this->isEditRequest = true;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
        $this->username = $user->username;
    }
    public function delete(User $user){
   
        $user->delete();
        // $this->redirect('/users');
        return redirect('/users');    
    }
    public function render()
    {
        return view('livewire.register-user');
    }
}
