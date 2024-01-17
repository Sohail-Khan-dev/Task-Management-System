<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit(User $user){
        // dd("edit of User Controller : ");
        return view('User.register', compact('user'));
    }    
    public function delete(User $user){
        $user->delete();
        return redirect('/users'); // ->route('/');
    }

}
