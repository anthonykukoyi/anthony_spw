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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Route::resource('editor', 'CKEditorController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Routes for Admin to view, edit and delete users
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);

});

//Routes for Author to view users
Route::namespace('Author')->prefix('author')->name('author.')->middleware('can:view-users')->group(function(){
    Route::resource('/users', 'UsersController2', ['except' => ['show', 'create', 'store', 'update', 'destroy']]);

});