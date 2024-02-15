@extends('Layouts.Mainlayout')  
@section('title','Blog')
@section('main-content') 
<div class="bg-blue-300 p-4 flex justify-center items-center">
      <!-- Logo and Title -->
      <div>
        <h1 class="text-xl font-semibold  text-gray-500 "> Categories <span class="ml-8 mr-4"> |</span> 
          <!-- <span class="flex "> -->
            <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-600 hover:bg-green-950  hover:text-white" > All </button>
            <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-600 hover:bg-green-950  hover:text-white" > Laravel </button>
            <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-600 hover:bg-green-950  hover:text-white" > Livewire </button>
            <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-600 hover:bg-green-950  hover:text-white" > Tailwind Css </button>
            <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-600 hover:bg-green-950  hover:text-white" > Backend Development </button>
            <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-600 hover:bg-green-950  hover:text-white" > Frontend Development </button>
            <button class="px-3 py-1 text-sm border rounded-xl bg-transparent text-gray-600 hover:bg-green-950  hover:text-white" > Web Development </button>
          <!-- </span> -->
        </div>
    </div>
  <div class="flex h-screen overflow-hidden">
      <!-- Sidebar -->
      <x-sidebar />
    <div class="flex flex-wrap justify-around bg-indigo-100 w-full">

        @foreach ($publishedPosts as $blog)
          <x-blog-card 
              :title="$blog->title" 
              :image-url="$blog->image" 
              :author="$blog->author" 
              :url="route('blog', $blog->slug)" 
              :category="$blog->category"
              :status="$blog->status"
              :id="$blog->id"
          />
      @endforeach
      @foreach ($draftPosts as $blog)
          <x-blog-card 
              :title="$blog->title" 
              :image-url="$blog->image" 
              :author="$blog->author" 
              :url="route('blog', $blog->slug)" 
              :category="$blog->category"
              :status="$blog->status"
              :id="$blog->id"
          />
      @endforeach
      @foreach ($pendingPosts as $blog)
          <x-blog-card 
              :title="$blog->title" 
              :image-url="$blog->image" 
              :author="$blog->author" 
              :url="route('blog', $blog->slug)" 
              :category="$blog->category"
              :status="$blog->status"
              :id="$blog->id"
          />
      @endforeach
  </div>
</div>
@endsection