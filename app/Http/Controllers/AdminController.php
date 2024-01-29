<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        dd("This is Dashboard : ");
        $publishedPosts = Blog::where('status', 'published')->get();
        $draftPosts = Blog::where('status', 'draft')->get();
        $pendingPosts = Blog::where('status', 'pending')->get();

        return view('blog.dashboard', compact('publishedPosts', 'draftPosts', 'pendingPosts'));
    }

    public function create(){
        dd("This is Create : ");
    }
    public function edit(){
        dd("This is Edit : ");
    }
    public function delete(){
        dd("This is Delete : ");
    }
    public function show(){
        dd("This is Show : ");
    }
    public function index(){
        dd("This is Index : ");
    }  
    public function store(){
        dd("This is Store : ");
    }
    public function update(){
        dd("This is Update : ");
    }
    public function destroy(){
        dd("This is Destroy : ");
    }
    public function publish(){
        dd("This is Publish : ");
    }
    public function unpublish(){
        dd("This is Unpublish : ");
    }
    public function approve(){
        dd("This is Approve : ");
    }
    public function reject(){
        dd("This is Reject : ");
    }
    public function archive(){
        dd("This is Archive : ");
    }
    public function restore(){
        dd("This is Restore : ");
    }
    public function deletePermanent(){
        dd("This is Delete Permanent : ");
    }
    public function search(){
        dd("This is Search : ");
    }

}
