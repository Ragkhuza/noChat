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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $jobs = [
        'Code',
        'Eat',
        'Sleep'
    ];
    return view('welcome', compact('jobs'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('messages/refresh', 'HomeController@refresh');

Route::get('messages/{id}', 'HomeController@messages');

Route::post('/home/send', 'HomeController@sendMessage');