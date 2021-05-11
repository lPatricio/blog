<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PagesController;

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

//Route::get('/','PagesController@home');
Route::get('/',[App\Http\Controllers\PagesController::class, 'home']);
Route::get('blog/{post}',[App\Http\Controllers\PostsController::class, 'show'])->name('posts.show') ;
Route::group([
            'prefix'=>'admin',
            'namespace'=>'admin',
            'middleware'=>'auth'],
        function(){
            Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
            Route ::get('posts',[App\Http\Controllers\Admin\PostsController::class,'index'])->name('admin.posts.index')  ;
            Route ::get('posts/create',[App\Http\Controllers\Admin\PostsController::class,'create'])->name('admin.posts.create')  ;
            Route ::post('posts',[App\Http\Controllers\Admin\PostsController::class,'store'])->name('admin.posts.store')  ;
            Route ::get('posts/{post}',[App\Http\Controllers\Admin\PostsController::class,'edit'])->name('admin.posts.edit')  ;
            Route ::put('posts/{post}',[App\Http\Controllers\Admin\PostsController::class,'update'])->name('admin.posts.update')  ;
            Route ::post('posts/{post}/photos',[App\Http\Controllers\Admin\PhotosController::class,'store'])->name('admin.posts.photos.store')  ;
        });
Route::get('summer',function(){
    return view('summer');
});

Route::get('posts',function(){
    return App\Models\Post::all();
});

//Route::get('home','HomeController@index');

Route::auth(['register'=>false,'login']);
//Auth::routes();
//Auth::routes(['register']);


