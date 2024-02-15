@extends('Layouts.Mainlayout')  
@section('title','Blog')
@section('main-content') 

<div class="flex h-screen overflow-hidden">
    <x-sidebar/>
<div class="container mx-auto px-4 py-8">
    
    <h1 class="text-2xl font-bold mb-6">Create Blog</h1>
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf <!-- CSRF token for security -->

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
            <input type="text" id="slug" name="slug" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full">
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
                <option value="pending">pending</option>
            </select>
        </div>
        <!-- Author will be added Automatically by getting the loggedIn user Record  -->
        <!-- <div>
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <input type="text" id="author" name="author" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div> -->

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <input type="text" id="category" name="category" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
            <input type="text" id="tags" name="tags" placeholder="Comma-separated tags" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300">Create</button>
        </div>
    </form>
</div>
</div>
@endsection