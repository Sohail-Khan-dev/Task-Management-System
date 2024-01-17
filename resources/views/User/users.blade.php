@extends('layouts.Mainlayout')
@section('title','All Users')
@section('main-content')
<div class="container mx-auto p-6 bg-gray-200 pb-72">
    <!-- <div class="flex flex-row justify-end items-center mb-4"> -->
     <div class="flex items-center text-center p-2 bg-purple-600 w-full justify-between text-white rounded">
             <h1 class="text-xl font-bold"></h1> <!-- This is created to make the User in the Center  -->
            <h1 class="text-3xl font-bold">Users</h1>
            @if(auth()->user() && auth()->user()->role == 'admin')
                <a href="/register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New User
            </a>
            @else
                <div> </div>
        @endif
        <!-- </div>        -->
    </div>
    
    <table class="min-w-full table-auto bg-white">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Username</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">role</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <div wire:key="{{ $user->id }}"> 
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->username }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->role }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('register', $user) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        |
                        <a href="{{ route('users.destroy', $user) }}" class="text-red-600 hover:text-red-900">Delete</a>
                    </td>
                </tr>
            </div>
            @endforeach
        </tbody>
    </table>
    {{$users->links('pagination.pagination_laravel')}}
</div>
@endsection