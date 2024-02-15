@extends('Layouts.Mainlayout')  
@section('title','Blog View')
@section('main-content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 top-5">
    <div class="fixed inset-0 bg-black bg-opacity-100 overflow-y-auto h-full w-full z-50">
        <!-- Blog Image -->
        <img class="max-w-3xl top-4" src="/blogs/1706727439.png" alt="Blog Title">

        <!-- Black transparent overlay with title -->
        <div class="absolute top-0 left-0 right-0 bottom-0 bg-black bg-opacity-90 flex items-center justify-center">
            <h2 class="text-xl font-bold text-white text-center px-4">{{$blog->title}}</h2>
        </div>
    </div>
    <!-- Blog details and description below the image -->
    <div class="p-4">
            <!-- Blog Details -->
            <div class="flex items-center space-x-2 text-gray-600 text-sm bg-lime-500 ">
                <span>{{$blog->category}}</span>
                <span>&middot;</span>
                <span>{{$blog->author}}</span>
                <span>&middot;</span>
                <span>Read Time</span>
                <!-- ... other details -->
            </div>
            <!-- Blog Description -->
            <div class="mt-2 text-gray-700 text-sm">
                <p>
                    {{$blog->description}}
                </p>
            </div>
        </div>
</div>

@endsection()