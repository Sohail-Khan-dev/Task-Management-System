@extends('Layouts.Mainlayout')  
@section('title','Home')

@section('main-content')

<div class="container mx-auto px-4 py-6">
    @auth
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold">Task Management System</h1>
            <p class="text-xl mt-2">Welcome, {{ auth()->user()->name }}!</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Your Role: {{ ucfirst(auth()->user()->role) }}</h2>

            @php
                $role = auth()->user()->role;
            @endphp

            @if($role === 'admin')
                <p>You have all administrative authorities, including adding, editing, and deleting users and tasks.</p>
            <!-- @elseif($role === 'manager')
                <p>You can manage all tasks and users but cannot add new users or tasks.</p> -->
            @elseif($role === 'editor')
                <p>You can edit tasks and user details but cannot delete any users or tasks.</p>
            @elseif($role === 'user')
                <p>You can view tasks and user information.</p>
            @else
                <p>You do not have permission to view tasks or user information.</p>
            @endif
        </div>
    @else
    <div class="text-center">
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
        <p class="font-bold text-2xl">Attention</p>
        <p class="font-semibold text-xl">Please log in to view <strong class="text-red-700">ALL</strong> content.</p>
    </div>
</div>

    @endauth
</div>
<div class="container mx-auto px-4 py-6">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">User Roles and Capabilities</h1>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Understanding User Roles</h2>
        <ul class="list-disc list-inside leading-10 indent-4  ">
            <li><strong>Admin:</strong> Has all administrative authorities, including adding, editing, and deleting users and tasks.</li>
            <!-- <li><strong>Manager:</strong> Can manage all tasks and users but cannot add new users or tasks.</li> -->
            <li><strong>Editor:</strong> Can edit tasks and user details but cannot delete any users or tasks.</li>
            <li><strong>User:</strong> Can view tasks and user information.</li>
            <li><strong>Guest:</strong> Does not have permission to view tasks or user information on the dashboard.</li>
        </ul>
    </div>
</div>

@endsection
