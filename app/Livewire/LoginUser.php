<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginUser extends Component
{
    public $email = '';
    public $password = '';

    public function submit()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/tasks');
        }

        session()->flash('error', 'The provided credentials do not match our records.');
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showLoginform()
    {
       return view('user.login');
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
