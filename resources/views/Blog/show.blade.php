@extends('Layouts.Mainlayout')  
@section('title','Blog View')
@section('main-content')
<div >
    <div class="bg-blue-200 ">
        <div class=" bg-gray-500">
            <!-- Blog Image -->
            <img class="top-4 w-96 h-96" src="{{ asset($blog->image) }}" alt="Blog Title">      
            <div class="flex items-center space-x-2 text-red-700 font-bold ">
                        <span>Category :{{$blog->category}}</span>
                        <span>Author :{{$blog->author}}</span>
                        <span>Tags : {{$blog->tags}}</span>
            </div>
        </div>
        <div class = "flex flex-col gap-4 w-2/3 h-2/3 bg-amber-300">
            <h2 class="text-xl font-bold text-blue-500 text-center px-4">{{$blog->title}}</h2>
            <div class="mt-2 text-black text-xl bg-blue-500 min-h-52">
                <p>
                    {{$blog->description}}
                </p>
            </div>
        </div>    
    </div>
</div>
@endsection()