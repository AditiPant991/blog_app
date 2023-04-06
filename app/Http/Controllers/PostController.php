<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest();
  if(request('search')){
    $posts
    ->where('title', 'like', '%' . request('search') . '%')
    ->orWhere('body', 'like', '%' . request('search') . '%');

  }
  return view('posts',[
    'posts' => $posts->get(),
    'categories' => Category::all()
  ]);
}

public function show(Post $post){
    return view('post',[
        'post' => $post
    ]);
}

public function create(){
  
  return view ('admin.create');
}

public function store(){
  
  $attributes = request()->validate([
    'title' => 'required',
    'slug' => ['required', ValidationRule::unique('posts', 'slug')], //post table slug column
    'excerpt' => 'required',
    'body' => 'required',
    'category_id' => ['required', ValidationRule::exists('categories', 'id')]
    
  ]);
  

  $attributes['user_id'] = auth()->id(); 



  Post::create($attributes);

  return redirect('/');

}

}
