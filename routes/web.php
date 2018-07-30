<?php

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

//Common Routes
Route::get('register','AuthController@get_register')->name('get_register');
Route::post('register','AuthController@register')->name('register');
Route::get('login','AuthController@get_login')->name('get_login');
Route::post('login','AuthController@login')->name('login');
Route::get('activate_account/{token}','AuthController@activate_account')->name('activate_account');
Route::get('forgot_password','AuthController@get_forgot_password')->name('get_forgot_password');
Route::post('forgot_password','AuthController@forgot_password')->name('forgot_password');
Route::get('reset_password/{token}','AuthController@reset_password')->name('reset_password');
Route::post('update_password','AuthController@update_password')->name('update_password');
Route::get('logout','AuthController@logout')->name('logout');


//Admin Routes
Route::name('super.')->middleware('is_admin:1')->prefix('super')->group(function (){
    Route::get('dashboard','AdminController@getDashboard')->name('dashboard');

    //Users
    Route::get('users','AdminController@getUsers')->name('get_users');
    Route::post('users','AdminController@users')->name('users');
    /*Route::get('edit_user/{id}','AdminController@editUser')->name('edit_user');*/
    Route::get('approve_user/{id}','AdminController@approveUser')->name('approve_user');
    Route::get('delete_user/{id}','AdminController@deleteUser')->name('delete_user');
    Route::get('add_user','AdminController@getAddUser')->name('get_add_user');
    Route::post('save_user','AdminController@saveUser')->name('save_user');

    //Category
    Route::get('category','AdminController@getCategory')->name('get_category');
    Route::post('category','AdminController@category')->name('category');
    Route::get('edit_category/{id}','AdminController@editCategory')->name('edit_category');
    Route::get('approve_category/{id}','AdminController@approveCategory')->name('approve_category');
    Route::get('delete_category/{id}','AdminController@deleteCategory')->name('delete_category');
    Route::get('add_category','AdminController@getAddCategory')->name('get_add_category');
    Route::post('save_category','AdminController@saveCategory')->name('save_category');

    //Post
    Route::get('posts','AdminController@getPosts')->name('get_posts');
    Route::post('posts','AdminController@posts')->name('posts');
    Route::get('edit_post/{id}','AdminController@editPost')->name('edit_post');
    Route::get('delete_post/{id}','AdminController@deletePost')->name('delete_post');
    Route::get('publish_post/{id}','AdminController@publishPost')->name('publish_post');
    Route::get('add_post','AdminController@getAddPost')->name('get_add_post');
    Route::post('save_post','AdminController@savePost')->name('save_post');

    //Comments
    Route::get('comments','AdminController@getComments')->name('get_comments');
    Route::get('profile','AdminController@getProfile')->name('get_profile');
});


//User Routes
Route::name('user.')->middleware('auth')->prefix('user')->group(function (){
    Route::get('dashboard','UserController@getDashboard')->name('dashboard');
    Route::get('category','UserController@getCategory')->name('get_category');
    Route::get('posts','UserController@getPosts')->name('get_posts');
    Route::get('comments','UserController@getComments')->name('get_comments');
    Route::get('add_post','UserController@getAddNewPost')->name('get_add_post');
    Route::get('profile','UserController@getProfile')->name('get_profile');
});


//Blog
Route::name('blog.')->group(function (){
    Route::get('/','BlogController@blogHome')->name('blog');
    Route::get('/posts/{post_url}','BlogController@singleBlog')->name('single_blog');

});
