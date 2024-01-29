@extends('Layouts.Mainlayout')  
@section('title','Blog')
@section('main-content')     
<div class="bg-white p-4 flex justify-between items-center">
    <!-- Logo and Title -->
    <div>
      <h1 class="text-xl font-semibold  text-gray-500 "> Categories <span class="ml-8 mr-4"> |</span> 
        <!-- <span class="flex "> -->
          <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-400 hover:bg-green-950  hover:text-white" > All </button>
          <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-400 hover:bg-green-950  hover:text-white" > Laravel </button>
          <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-400 hover:bg-green-950  hover:text-white" > Livewire </button>
          <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-400 hover:bg-green-950  hover:text-white" > Tailwind Css </button>
          <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-400 hover:bg-green-950  hover:text-white" > Backend Development </button>
          <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-400 hover:bg-green-950  hover:text-white" > Frontend Development </button>
          <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-400 hover:bg-green-950  hover:text-white" > Web Development </button>
        <!-- </span> -->
      </div>
   
  </div>
</div>
<div class="flex flex-wrap justify-around bg-indigo-100">
    <x-blog-card title="This is title" image-url="images/blog/genAi.png" read-time="3 mins read" url="/link-to-article" />
    <x-blog-card title="This is title" image-url="images/blog/genAi.png" read-time="3 mins read" url="/link-to-article" />
    <x-blog-card title="This is title" image-url="images/blog/genAi.png" read-time="3 mins read" url="/link-to-article" />
    <x-blog-card title="This is title" image-url="images/blog/genAi.png" read-time="3 mins read" url="/link-to-article" />
    <x-blog-card title="This is title" image-url="images/blog/genAi.png" read-time="3 mins read" url="/link-to-article" />
    <x-blog-card title="This is title" image-url="images/blog/genAi.png" read-time="3 mins read" url="/link-to-article" />
</div>

@endsection