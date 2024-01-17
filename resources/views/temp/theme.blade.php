@extends('layouts.Mainlayout')

@section('title','Color Theme')

@section('main-content')
<div class="bg-gray-100 text-gray-800">
   @section('projectName')
        <header class="bg-blue-500 text-white">
        <h1>Your Task Management System</h1>
    </header>

    <button class="bg-blue-500 text-white hover:bg-blue-600">
        Primary Action
    </button>

    <button class="bg-blue-300 text-white hover:bg-blue-400">
        Secondary Action
    </button>

    <div class="alert bg-red-400 text-white">
        Important Alert
    </div>

    <div class="p-4 border border-gray-300 shadow-md">
        <p>Task details...</p>
    </div>

@endsection