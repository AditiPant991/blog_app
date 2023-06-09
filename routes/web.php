<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('posts/{post:slug}',[PostController::class, 'show']);//wildcat(post)

Route::get('register', [RegisterController::class,'create'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
Route::post('login',[SessionsController::class, 'store'])->middleware('guest');


Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/create',[PostController::class, 'create'])->middleware('admin');

Route::post('admin',[PostController::class, 'store'])->middleware('admin');


Route::get('categories/{category:slug}', function (Category $category){
  return view('posts',[
    'posts' => $category->posts,
    'categories' => Category::all(),
    'currentCategory' => $category
  ]);
});

Route::get('authors/{author:username}', function (User $author){
  return view('posts',[
    'posts' => $author->posts,
    'categories' => Category::all()
  ]);
});

