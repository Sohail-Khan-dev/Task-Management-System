<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
    public function logout(){
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        // $this->emit('loggedOut');
        return response()->json(['message' => 'Logged out successfully'],200);
    }   
    public function register(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => ['required','unique:users,email'], // 'login' is a generic field name for both email and username
            'password' => ['required'],
            'verifypassword' => ['required', 'same:password'],
            'name' => ['required','string'],
            'username' => ['required','unique:users,username'],
            'role' => ['required']
        ]);
        if($validator->fails()){
            $data = [
                'status' => 400,
                'message' => 'Input Fields are missing Or wrong'. $validator->errors(),
                'data' => $request->all(),
            ];
            return response()->json($data,400);
        } 
         
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'verifypassword' => $request->verifypassword,
        ]);
        $success['token'] = $user->createToken('taskManager')->plainTextToken;
        $success['name'] = $user->name;
        $data = [
            'status' => 200,
            'message' => 'user created successfully',
            'data' => $success
        ];
        return response()->json($data, 200);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required'], // 'login' is a generic field name for both email and username
            'password' => ['required'],
        ]);
        if($validator->fails()){
            $data = [
                'status' => 400,
                'message' => 'fail to validate the user '. $validator->errors(),
                'data' => $request->all(),
            ];
            return response()->json($data, 400);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('taskManager')->plainTextToken;
            $success['name'] = $user->name;
            $data = [
                'status' => 200,
                'message' => 'user LoggedIn successfully',
                'data' => $success
            ];
            return response()->json($data, 200);
        }
        $data = [
            'status' => 400,
            'message' => 'user not found',
            'data' => $request->all(),
        ];
        return response()->json($data,404);
    }

    public function getAllUsers(){
        $users = User::all();
        return response()->json($users, 200);
    }
}
