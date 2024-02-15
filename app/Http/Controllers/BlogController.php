<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class BlogController extends Controller
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
        }else{
            $filename = 'default.png';
            $path = 'blogs/';
        }
        
        $validator =  FacadesValidator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
            'author' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);
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
        // }
    }
    public function apiStore(Request $request){
        $validator =  FacadesValidator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
            'author' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);
        if($validator->fails())        
        {
            $data =[
                'status' => 422,
                'message' => 'Validation Error'. $validator->messages()
            ];
            return response()->json($data,422);
        } 
        else
        {
            $author = 'Unknown';
            if (!Auth()->guest()) {
                $author = Auth()->user()->name;
            }        
            $publish_at = 'not published';
            $created_at = Date::now();
            
            if ($request->status == 'published') {
                $publish_at = Date::now();
            }
            //  dd('image is : ' .$path . $filename);
            Blog::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'image' => 'this is from API no Handled till yet',
                'status' => $request->status,
                'author' => $author,
                'published_at' => $publish_at,
                'created_at' => $created_at,
                'category' => $request->category,
                'tags' => $request->tags
            ]);
            $data =[
                'status' => 200,
                'message'=> 'Record Successfully Created '
            ];
            return response()->json($data,200);
        }
    }
    public function edit(){
        dd("This is Edit : ");
    }
    public function delete(){
        dd("This is Delete : ");
    }
    public function show($id){
       $blog =  Blog::find($id);
    //    dd($blog);
       return view('Blog.show', ['blog'=>$blog]);
    }
    public function apiShowAll(){
        // return " this is Api Show All ";
        $blogs = Blog::all();
        $data =[
            'status' => 200,
            'message' => $blogs,
        ];
        return response()->json($data,200);
    }
    public function index(){
        dd("This is Index : ");
    }  
   
    public function apiUpdate(Request $request, $id)
    {
        $validator = FacadesValidator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
            'author' => 'required',
            'category' => 'required',
            'tags' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 422, 'message' => 'Validation Error', 'errors' => $validator->messages()], 422);
        }

        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['status' => 404, 'message' => 'Blog not found'], 404);
        }

        $blog->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
            'author' => $request->author,
            'category' => $request->category,
            'tags' => $request->tags,
            'published_at' => $request->status == 'published' ? now() : "null",
        ]);

        return response()->json(['status' => 200, 'message' => 'Blog updated successfully']);
}

    public function apiDelete($id){
    
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['status' => 404, 'message' => 'Blog not found'], 404);
        }else{
            $blog->delete();
            return response()->json(['status' => 200, 'message' => 'Blog deleted successfully']);   
        }

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
