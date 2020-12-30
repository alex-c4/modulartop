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

// comentado temporalmente
// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/', 'WelcomeController@index')->name('welcome');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Password Confirmation Routes...
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::get('/home', 'HomeController@index')->name('home');

Route::view('/modulartop', 'modulartop');
// Route::view('/novedades', 'novedades');
// Route::view('/post', 'post');
Route::view('/servicios', 'servicios/servicios');
Route::view('/fabricacion', 'fabricacion/fabricacion');
Route::view('/acabado-tradicional', 'tableros/tableros-tradicional');
Route::view('/acabado-altobrillo', 'tableros/tableros-altobrillo');
Route::view('/acabado-supermate', 'tableros/tableros-supermate');

// Contacts
Route::post('contact.store', ['as' => 'contact.store', 'uses' => 'ContactController@store']);
Route::post('contact.contact', ['as' => 'contact.contact', 'uses' => 'ContactController@contact']);
Route::get('contact/tellus', ['as' => 'contact.tellus', 'uses' => 'ContactController@tellus']);

// Newsletter
Route::get('newsletter/create', ['as' => 'newsletter.create', 'uses' => 'NewsletterController@create']);
Route::post('newsletter/store', ['as' => 'newsletter.store', 'uses' => 'NewsletterController@store']);
Route::get('newsletter/index', ['as' => 'newsletter.index', 'uses' => 'NewsletterController@index']);
Route::get('newsletter/edit/{id}', ['as' => 'newsletter.edit', 'uses' => 'NewsletterController@edit']);
Route::put('newsletter/update/{id}', ['as' => 'newsletter.update', 'uses' => 'NewsletterController@update']);
// Route::get('novedades/{id?}', ['as' => 'novedades', 'uses' => 'NewsletterController@novedades']);
Route::get('novedades/{id?}', ['as' => 'novedades', 'uses' => 'NewsletterController@novedades']);
Route::get('post/{id}/{name}', ['as' => 'show', 'uses' => 'NewsletterController@show']);
Route::delete('newsletter/delete/{id}', ['as' => 'newsletter.delete', 'uses' => 'NewsletterController@delete']);
Route::patch('newsletter/{id}', ['as' => 'newsletter.restore', 'uses' => 'NewsletterController@restore']);
// Route::get('novedadesFilter/{id}', ['as' => 'novedadesFilter', 'uses' => 'NewsletterController@novedadesFilter']);

// AJAX
//Category
Route::post('category/storeajax', ['as' => 'category.storeajax', 'uses' => 'CategoryController@store_ajax']);

//Ver mas post
Route::post('newsletter/other_post_eajax', ['as' => 'newsletter.otherpostajax', 'uses' => 'NewsletterController@other_post_ajax']);


