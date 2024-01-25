<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginUser extends Component
{
    // The Email property get both value for login User name and email and then it is filter on submission
    public $email = '';
    public $password = '';
    // #region Previous submit only for Email
    // public function submit()
    // {
    //     $credentials = $this->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('/tasks');
    //     }

    //     session()->flash('error', 'The provided credentials do not match our records.');
    //     // return back()->withErrors([
    //     //     'email' => 'The provided credentials do not match our records.',
    //     // ]);
    // }
    // #end region

    public function submit()
    {
        $this->validate([
            'email' => ['required'], // 'login' is a generic field name for both email and username
            'password' => ['required'],
        ]);
    
        // Determine if the input is an email or username
        $loginType = filter_var($this->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    
        $credentials = [
            $loginType => $this->email,
            'password' => $this->password
        ];
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/tasks');
        }
    
        session()->flash('error', 'The provided credentials do not match our records.');
    }
    
    public function showLoginform()
    {
       return view('User.login');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        // $this->emit('loggedOut');
       return redirect('/home');
    }

    public function render()
    {
        return view('livewire.login-user');
    }
}
