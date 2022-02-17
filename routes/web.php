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
    return view('student.welcome');
});

Route::get('/books', function (){
    return view('student.books');
});

Route::get('/about', function (){
    return view('student.about');
});

Route::get('/signin', function (){
    return view('student.signin');
});

Route::get('/signup', function (){
    return view('student.signup');
});

Route::get('/team', function (){
    return view('student.books');
});

