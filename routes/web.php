<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//User
Route::get('/admin/user/list',[\App\Http\Controllers\UserController::class,'index']);
Route::get('/search',[\App\Http\Controllers\UserController::class,'search'])->name('search');
Route::get('/search/comment',[\App\Http\Controllers\UserController::class,'search_comment'])->name('search.comment');
Route::get('/search/post',[\App\Http\Controllers\UserController::class,'search_post'])->name('search.post');
Route::get('/sort/name',[\App\Http\Controllers\UserController::class,'sort_name'])->name('sort.name');
Route::get('/sort/age',[\App\Http\Controllers\UserController::class,'sort_age'])->name('sort.age');
Route::get('/admin/user/create',[\App\Http\Controllers\UserController::class,'create'])->name('create');
Route::post('/create',[\App\Http\Controllers\UserController::class,'store'])->name('store');
Route::get('/user/{id}/comment',[\App\Http\Controllers\UserController::class,'show_comment'])->name('comment.show');
Route::get('/user/{id}/post',[\App\Http\Controllers\UserController::class,'show_post'])->name('post.show');
Route::get('/users/{id}',[\App\Http\Controllers\UserController::class,'info_user'])->name('comment.info.user');

//Comment
Route::get('/admin/comment/list',[\App\Http\Controllers\CommentController::class,'index']);
Route::get('/comments/{id}/users',[\App\Http\Controllers\CommentController::class,'show_user'])->name('user.show');


