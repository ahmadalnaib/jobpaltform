<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();


/* profile route*/
Route::get('/profile',[ProfileController::class,'index'])->name('profile')->middleware('auth');
Route::put('/profile/update',[ProfileController::class,'update'])->name('profile.update')->middleware('auth');
// -----------------------------

//tag route
Route::get('/tags',[TagController::class,'index'])->name('tags')->middleware('auth');
Route::get('/tag/create',[TagController::class,'create'])->name('tag.create')->middleware('auth');
Route::post('/tag/store',[TagController::class,'store'])->name('tag.store')->middleware('auth');;
Route::get('/tag/show/{slug}',[TagController::class,'show'])->name('tag.show');
Route::get('/tag/edit/{id}',[TagController::class,'edit'])->name('tag.edit')->middleware('auth');;
Route::put('/tag/update/{id}',[TagController::class,'update'])->name('tag.update')->middleware('auth');;
Route::delete('/tag/destroy/{id}',[TagController::class,'destroy'])->name('tag.destroy')->middleware('auth');
// Post controllers

//Route::get('/',[PostController::class,'index'])->name('home');
Route::get('/',[PostController::class,'index'])->name('posts');
Route::get('/posts/trashed',[PostController::class,'postsTrashed'])->name('posts.trashed');
Route::get('/post/create',[PostController::class,'create'])->name('post.create')->middleware('auth');
Route::post('/post/store',[PostController::class,'store'])->name('post.store')->middleware('auth');
Route::get('/post/show/{slug}',[PostController::class,'show'])->name('post.show');
Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post.edit')->middleware('auth');
Route::put('/post/update/{id}',[PostController::class,'update'])->name('post.update')->middleware('auth');
Route::delete('/post/destroy/{id}',[PostController::class,'destroy'])->name('post.destroy')->middleware('auth');
Route::get('/post/hdelete/{id}',[PostController::class,'hdelete'])->name('post.hdelete')->middleware('auth');
Route::get('/post/restore/{id}',[PostController::class,'restore'])->name('post.restore')->middleware('auth');
Route::get('/post/myposts',[PostController::class,'myPosts'])->name('post.myposts')->middleware('auth');


