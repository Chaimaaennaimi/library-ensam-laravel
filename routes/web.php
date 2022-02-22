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

Route::get('/', [App\Http\Controllers\studentControllers::class, 'home'])->name('home')->middleware([]);
Route::get('/books', [App\Http\Controllers\studentControllers::class, 'books'])->middleware("auth");
Route::get('/profile', [App\Http\Controllers\studentControllers::class, 'profile'])->middleware("auth");
Route::get('/about', [App\Http\Controllers\studentControllers::class, 'about'])->middleware([]);
Route::get('/signin', [App\Http\Controllers\studentControllers::class, 'signin'])->middleware([]);
Route::get('/signup', [App\Http\Controllers\studentControllers::class, 'signup'])->middleware([]);
Route::get('/team', [App\Http\Controllers\studentControllers::class, 'team'])->middleware([]);
Route::get('/testImage', [App\Http\Controllers\studentControllers::class, 'getProduct'])->middleware([]);
Route::get('/like/{id}', [App\Http\Controllers\studentControllers::class, 'like'])->middleware([]);
Route::get('/redirects', [App\Http\Controllers\HomeController::class, 'redirects'])->middleware('auth');
Route::get('/redirects2', [App\Http\Controllers\HomeController::class, 'redirects2'])->middleware('auth');
Route::post('/redirects2', [App\Http\Controllers\studentControllers::class, 'studentInfos'])->middleware([]);
Route::post('/addBook', [App\Http\Controllers\studentControllers::class, 'addBook'])->middleware([])->middleware("auth");
Route::get('/books/{id}', [App\Http\Controllers\studentControllers::class, "singleBook"])->middleware("auth");
Route::post('/reserver', [App\Http\Controllers\studentControllers::class, 'reserver'])->middleware("auth");
Route::post('/sendComment', [App\Http\Controllers\studentControllers::class, 'sendComment'])->middleware("auth");


/* For testing purposes only */
Route::get('/test', [App\Http\Controllers\studentControllers::class, 'showToken'])->middleware([]);
Route::get('/singleBook', function () {
    $pageTitle = 'MACHINE LEARNING 1';
    return view('student.singleBook', compact('pageTitle'));
});

/***************************************************damin****************************************** */
Route::get('/category',[App\Http\Controllers\AdminController::class,"category"])->middleware(["auth","admin"]);
Route::get('/deletecat/{id}',[App\Http\Controllers\AdminController::class,"deletecategory"])->middleware(["auth","admin"]);
Route::get('/book',[App\Http\Controllers\AdminController::class,"book"])->middleware(["auth","admin"]);
Route::get('/copy',[App\Http\Controllers\AdminController::class,"copy"])->middleware(["auth","admin"]);

Route::get('/deletebook/{id}',[App\Http\Controllers\AdminController::class,"deletebook"])->middleware(["auth","admin"]);
Route::get('/user',[App\Http\Controllers\AdminController::class,"user"])->middleware(["auth","admin"]);
Route::get('/addcat',[App\Http\Controllers\AdminController::class,"addcat"])->middleware(["auth","admin"]);
Route::get('/deleteuser/{id}',[App\Http\Controllers\AdminController::class,"deleteuser"])->middleware(["auth","admin"]);
Route::post('/uploadcat',[App\Http\Controllers\AdminController::class,"uploadcat"])->middleware(["auth","admin"]);
Route::post('/uploadbook',[App\Http\Controllers\AdminController::class,"uploadbook"])->middleware(["auth","admin"]);
Route::post('/uploadcopy',[App\Http\Controllers\AdminController::class,"uploadcopy"])->middleware(["auth","admin"]);
Route::get('/suggestion',[App\Http\Controllers\AdminController::class,"suggestion"])->middleware(["auth","admin"]);
Route::get('/deletesuggestion/{id}',[App\Http\Controllers\AdminController::class,"deletesuggestion"])->middleware(["auth","admin"]);


Route::get('/reservation', [App\Http\Controllers\AdminController::class, "reservation"])->middleware(["auth","admin"]);
Route::get('/validateresa/{id}', [App\Http\Controllers\AdminController::class, "validateresa"])->middleware(["auth","admin"]);
Route::get('/terminateresa/{id}', [App\Http\Controllers\AdminController::class, "terminateresa"])->middleware(["auth","admin"]);

Route::get('/addbook',[App\Http\Controllers\AdminController::class,"addbook"])->middleware(["auth","admin"]);
Route::get('/addcopy',[App\Http\Controllers\AdminController::class,"addcopy"])->middleware(["auth","admin"]);

Route::get('/showEtudiantDetails/{id}', [App\Http\Controllers\AdminController::class, 'showDetails'])->middleware(["auth","admin"]);

Route::get('/write-mail/{id}', [App\Http\Controllers\MailController::class, 'writeMail'])->middleware(["auth","admin"]);
Route::get('/send-mail', [App\Http\Controllers\MailController::class, 'sendMail'])->middleware(["auth","admin"]);

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware(["auth","admin"]) ;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'redirects'])->name('home');

