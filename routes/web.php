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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::resource('users',"Admin\AdminUserController");
    Route::resource('posts',"Admin\AdminPostController");
    Route::resource('categories', "Admin\AdminCategoryController");
    Route::resource('photos',"Admin\AdminPhotoController");
    Route::get('dashboard',"Admin\AdminDashboardController@index")->name('admin.dashboard');
});

Route::get('/' ,"Frontend\FrontHomeController@index")->name('front.home');
Route::get('/posts/category/{slug}', "Frontend\FrontHomeController@postsCategory")->name('front.posts.category');
Route::get('/post/{slug}', "Frontend\FrontHomeController@showSinglePost")->name('front.show.post');
