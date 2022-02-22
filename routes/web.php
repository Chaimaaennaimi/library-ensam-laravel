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


Route::get('/category',[App\Http\Controllers\AdminController::class,"category"]);
Route::get('/deletecat/{id}',[App\Http\Controllers\AdminController::class,"deletecategory"]);
Route::get('/book',[App\Http\Controllers\AdminController::class,"book"]);
Route::get('/copy',[App\Http\Controllers\AdminController::class,"copy"]);

Route::get('/deletebook/{id}',[App\Http\Controllers\AdminController::class,"deletebook"]);
Route::get('/user',[App\Http\Controllers\AdminController::class,"user"]);
Route::get('/addcat',[App\Http\Controllers\AdminController::class,"addcat"]);
Route::get('/deleteuser/{id}',[App\Http\Controllers\AdminController::class,"deleteuser"]);
Route::post('/uploadcat',[App\Http\Controllers\AdminController::class,"uploadcat"]);
Route::post('/uploadbook',[App\Http\Controllers\AdminController::class,"uploadbook"]);
Route::post('/uploadcopy',[App\Http\Controllers\AdminController::class,"uploadcopy"]);
Route::get('/suggestion',[App\Http\Controllers\AdminController::class,"suggestion"]);
Route::get('/deletesuggestion/{id}',[App\Http\Controllers\AdminController::class,"deletesuggestion"]);

Route::get('/reservation', [App\Http\Controllers\AdminController::class, "reservation"]);
Route::get('/validateresa/{id}', [App\Http\Controllers\AdminController::class, "validateresa"]);
Route::get('/terminateresa/{id}', [App\Http\Controllers\AdminController::class, "terminateresa"]);

Route::get('/addbook',[App\Http\Controllers\AdminController::class,"addbook"]);
Route::get('/addcopy',[App\Http\Controllers\AdminController::class,"addcopy"]);

Route::get('/showEtudiantDetails/{id}', [AdminController::class, 'showDetails']);

Route::get('/write-mail/{id}', [App\Http\Controllers\MailController::class, 'writeMail']);
Route::get('/send-mail', [App\Http\Controllers\MailController::class, 'sendMail']);

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);