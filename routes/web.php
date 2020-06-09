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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/modulartop', 'modulartop');
Route::view('/novedades', 'novedades');
Route::view('/novedades', 'novedades');
/*#home-section*/
// Contacts
Route::post('contact.store', ['as' => 'contact.store', 'uses' => 'ContactController@store']);
Route::post('contact.newsletter', ['as' => 'contact.newsletter', 'uses' => 'ContactController@newsletter']);
Route::get('contact/tellus', ['as' => 'contact.tellus', 'uses' => 'ContactController@tellus']);


