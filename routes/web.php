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

Route::get('/', [App\Http\Controllers\studentControllers::class, 'home'])->name('home');
Route::get('/books', [App\Http\Controllers\studentControllers::class, 'books'])->middleware([]);
Route::get('/about', [App\Http\Controllers\studentControllers::class, 'about'])->middleware([]);
Route::get('/signin', [App\Http\Controllers\studentControllers::class, 'signin'])->middleware([]);
Route::get('/signup', [App\Http\Controllers\studentControllers::class, 'signup'])->middleware([]);
Route::get('/team', [App\Http\Controllers\studentControllers::class, 'team'])->middleware([]);
Route::get('/testImage', [App\Http\Controllers\studentControllers::class, 'getProduct'])->middleware([]);
Route::get('/like/{id}', [App\Http\Controllers\studentControllers::class, 'like'])->middleware([]);
Route::post('/addBook', [App\Http\Controllers\studentControllers::class, 'addBook'])->middleware([]);
Route::get('/books/{Id}', [App\Http\Controllers\studentControllers::class, 'book'])->middleware([]);
Route::post('/reserver', [App\Http\Controllers\studentControllers::class, 'reserver'])->middleware([]);
Route::post('/sendComment', [App\Http\Controllers\studentControllers::class, 'sendComment'])->middleware([]);


/* For testing purposes only */
Route::get('/test', [App\Http\Controllers\studentControllers::class, 'showToken'])->middleware([]);
Route::get('/singleBook', function () {
    $pageTitle = 'MACHINE LEARNING 1';
    return view('student.singleBook', compact('pageTitle'));
});