<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('general/login');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/testform', function () {
    return view('testform');
});

Route::get('/register', function () {
    return view('general/register');
});

Route::get('/changePassword', function () {
    return view('general/changePassword');
});

Route::get('/forgetPassword', function () {
    return view('general/forgetPassword');
});