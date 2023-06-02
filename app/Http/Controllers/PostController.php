<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostSaveRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   public function index() {
   $posts = Post::all();
   return view('post.index')->with(['posts' => $posts]);
   }
   public function create() {
    return view('post.create');
   }
   public function store(PostSaveRequest $request) {
        $file = $request->file('file');
        $name = Str::random(10);
        $url = Storage::putFileAs('file', $file, $name . '.' . $file->extension());
   
      $val =Post::create([
         'title' => $request->input('title'),
         'description' => $request->input('description'),
         'email' => $request->input('email'),
         'file' => env('APP_URL') . '/' . $url,
      ]);
      return redirect()->route('home');
   }
   public function destory(Request $request)
   {
      $post =Post::where('title',$request->title)->first();
      $post->delete();
      return redirect()->back()->with(['message'=> 'Successfully deleted!!']);
   } 
   public function edit($title)
   {  
      $posts = Post::firstWhere('title',$title);
      return view('post.edit',compact('posts'));
   }
   public function update(Request $request,$title)
   {  
      $posts = Post::firstWhere('title',$title);
      $posts->title = $request->title;
      $posts->description = $request->description;
      $posts->email = $request->email;
      $posts->file = $request->file;
      $posts->update();
      return redirect()->route('home');
   }
}