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
    return view('welcome', ['container_classes' => 'flex-center']);
});

Route::get('/sql-injection', function () {
    return view('sql-injection');
    //return view('sql-injection', ['logged_in_user' => 'duuuuuude']);
});

Route::post('/sql-injection', 'SqlInjectionController@findUsers');

Route::get('/xss-attack', function () {
    return view('xss-attack');
});

Route::get('/file-upload', function () {
    return view('file-upload');
});
