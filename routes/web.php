<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\TripAdvisoerController;
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

    Route::get('/trip',[TripAdvisoerController::class,'getReviews']);
    

    // Route::get('/blogs', function(){
    //     return view('Blog.blogs');
    // });

    Route::get('/blog',[BlogController::class,'dashboard'])->name('blog');
    Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');
    Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');