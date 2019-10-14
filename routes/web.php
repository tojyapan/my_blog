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

Route::get('/', 'BlogController@index')->name('blog');

Route::get('/blog/{post}', 'BlogController@show')->name('blog.detail');

Route::get('category/{category}', 'BlogController@category')->name('category');

Route::get('/about', 'BlogController@about')->name('about');

Route::get('/author/{author}', 'BlogController@author')->name('author');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::get('/edit-account', 'Backend\HomeController@edit');

Route::post('/edit-account', 'Backend\HomeController@update');

Route::put('/backend/blog/restore/{blog}', 'Backend\BlogController@restore')->name('blog.restore');

Route::delete('/backend/blog/restore/{blog}', 'Backend\BlogController@forceDestroy')->name('blog.force-destroy');

Route::resource('/backend/blog', 'Backend\BlogController');

Route::resource('/backend/categories', 'Backend\CategoriesController');

Route::get('/backend/users/confirm/{users}', 'Backend\UsersController@confirm')->name('users.confirm');

Route::resource('/backend/users', 'Backend\UsersController');
