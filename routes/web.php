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


// friend

Route::get('/albums', 'AlbumsController@AlbumsStore')->name('AlbumsStore');

Route::get('/albums/{id}', 'AlbumsController@Details')->name('AlbumsDetails');

Route::post('/albums/comment', 'AlbumsController@AddComment')->name('AlbumsComments');

// friend admni

Route::get('/admin/albums', 'AlbumsController@Index');

Route::get('/admin/albums/create', "AlbumsController@Create");

Route::post('/admin/albums/create', "AlbumsController@Store");

Route::get('/admin/albums/delete/{id}', "AlbumsController@Delete");

Route::get('/admin/albums/edit/{id}', "AlbumsController@Edit");

Route::get('/admin/albums/{id}', "AlbumsController@Show");

Route::post('/admin/albums/edit', "AlbumsController@Update");

Route::delete('/admin/albums/delete', "AlbumsController@Remove");


// gpus

Route::get('/gpus', 'GpusController@GpusStore')->name('GpusStore');

Route::get('/gpus/{id}', 'GpusController@Details')->name('GpusDetails');

Route::post('/gpus/comment', 'GpusController@AddComment')->name('GpusComments');

// gpus admi

Route::get('/admin/gpus', 'GpusController@Index');

Route::get('/admin/gpus/create', "GpusController@Create");

Route::post('/admin/gpus/create', "GpusController@Store");

Route::get('/admin/gpus/delete/{id}', "GpusController@Delete");

Route::get('/admin/gpus/edit/{id}', "GpusController@Edit");

Route::get('/admin/gpus/{id}', "GpusController@Show");

Route::post('/admin/gpus/edit', "GpusController@Update");

Route::delete('/admin/gpus/delete', "GpusController@Remove");


// friends

Route::get('/friends', 'FriendsController@FriendsStore')->name('FriendsStore');

Route::get('/friends/{id}', 'FriendsController@Details')->name('FriendsDetails');

Route::post('/friends/comment', 'FriendsController@AddComment')->name('FriendsComments');

// friends admi

Route::get('/admin/friends', 'FriendsController@Index');

Route::get('/admin/friends/create', "FriendsController@Create");

Route::post('/admin/friends/create', "FriendsController@Store");

Route::get('/admin/friends/delete/{id}', "FriendsController@Delete");

Route::get('/admin/friends/edit/{id}', "FriendsController@Edit");

Route::get('/admin/friends/{id}', "FriendsController@Show");

Route::post('/admin/friends/edit', "FriendsController@Update");

Route::delete('/admin/friends/delete', "FriendsController@Remove");



Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

