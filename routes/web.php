<?php
use App\Livewire\LoginUser;
use App\Livewire\RegisterUser;
use App\Models\User;
use Illuminate\Support\Facades\Route;


    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/login', [LoginUser::class,'showLoginform'])->name('login');
    Route::get('/logout', [LoginUser::class,'logout'])->name('logout');
    Route::get('/home', function () {
        // dd('/ is called');
        
        return view('welcome');
    })->name('homes');

    Route::get('/register/{user?}', function (User $user = null) {
        //  dd($user->name. " Anme ".$user->email);
        return view('User.register',['user' => $user]);
    })->name('register');

    Route::get('/users', function () {
        return view('User.users',[
            'users' => App\Models\User::paginate(10)
        ]);
    });
    // Route::get('/edit/{user}', [UserController::class,'edit'])->name('users.edit');
    Route::get('/destroy/{user}', [RegisterUser::class,'delete'])->name('users.destroy');
    
    Route::get('/aboutus', function () {
        return view('aboutus');
    });
    
    Route::middleware(['auth'])->group(function (){
        Route::get('/tasks',function(){
            return view('Task.index');
        });
    });
    

    // Route::post('/addtask', [TaskManager::class,'store'])->name('task.store');
