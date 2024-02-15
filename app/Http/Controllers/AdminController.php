<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class AdminController extends Controller
{
    public function dashboard(){
        // dd("This is Dashboard : ");
        $publishedPosts = Blog::where('status', 'published')->get();
        $draftPosts = Blog::where('status', 'draft')->get();
        $pendingPosts = Blog::where('status', 'pending')->get();
        return view('Blog.blogs', compact('publishedPosts', 'draftPosts', 'pendingPosts'));
    }

    public function create(){
        // dd("This is Create : ");
        return view('Blog.create');
    }
    public function store(Request $request){
        $author = 'Unknown';
        if (!Auth()->guest()) {
            $author = Auth()->user()->name;
        }
        
        $publish_at = 'not published';
        $created_at = Date::now();
        
        if ($request->status == 'published') {
            $publish_at = Date::now();
        }
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'blogs/';
            $file->move($path, $filename);
        }
        //  dd('image is : ' .$path . $filename);
        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $path.$filename,
            'status' => $request->status,
            'author' => $author,
            'published_at' => $publish_at,
            'created_at' => $created_at,
            'category' => $request->category,
            'tags' => $request->tags
        ]);
        echo "<script>alert('Record stored successfully!');</script>"; 
        return redirect()->route('blog');
    }
    public function edit(){
        dd("This is Edit : ");
    }
    public function delete(){
        dd("This is Delete : ");
    }
    public function show($id){
       $blog =  Blog::find($id);
       return view('Blog.show', 'blog');
    }
    public function index(){
        dd("This is Index : ");
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
