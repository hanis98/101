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
Route::get('about-us', 'PagesController@aboutUs')->name('about-us');
Route::get('contact-us', 'PagesController@contactUs')->name('contact-us');
Route::resource('user', 'UserController');
Route::resource('department', 'DepartmentController');
Route::resource('peralatan', 'PeralatanController');
Route::resource('application', 'ApplicationController');
Route::resource('approval', 'ApprovalController');
Route::resource('authorize', 'AuthorizeController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get(
    'account/activate/{token}', 
    'Auth\ActivationController@activate'
)->name('account.activate');
Route::get(
    'account/activation/request',
    'Auth\ActivationController@request'
)->name('account.activation.request');
Route::post(
    'account/resend/activation',
    'Auth\ActivationController@resend'
)->name('account.activation.resend');