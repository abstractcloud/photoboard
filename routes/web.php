<?php

use App\Models\Gallery;
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

Route::get('/', 'GalleryController@index')->name('default');
Route::get('/users', 'UserController@index')->name('contacts');
Route::get('/user/{id}', 'GalleryController@index')->name('user.gallery');

Route::get('/api/gallery', 'GalleryController@gallery');

Route::resource('gallery', 'GalleryController')->except([
    'index'
]);

Route::get('/test/reset', function(){
    return view('auth.passwords.reset');
});

Route::get('/test/gallery', function(){
    Gallery::create([
        'title' => 'hello',
        'description' => 'test',
        'preview' => 'test',
        'image' => 'test',
        'path' => 'test',
        'user_id' => 1,
    ]);
});

Auth::routes();

Route::get('/messages',  'GalleryController@messages')->name('gallery.messages');

