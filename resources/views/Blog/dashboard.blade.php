@extends('Mainlayout') {{-- Make sure you have an admin layout file --}}

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl mb-8">Dashboard</h1>

    <div class="mb-4">
        <h2 class="text-lg">Published Posts</h2>
        {{-- List the published posts here --}}
    </div>

    <div class="mb-4">
        <h2 class="text-lg">Draft Posts</h2>
        {{-- List the draft posts here --}}
    </div>

    <div class="mb-4">
        <h2 class="text-lg">Pending Review</h2>
        {{-- List the pending review posts here --}}
    </div>
</div>
@endsection
