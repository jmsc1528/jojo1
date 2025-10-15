<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/home',[HomeController::class,'home'])->name('home');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('/add', [UserController::class, 'index'])->name('add');

 Route::post('/add_user', [UserController::class, 'store'])->name('add_user');

 Route::get('/edit_user/{id}',[UserController ::class,'edit'])->name('edit_user');
 Route::post('/update_user',[UserController ::class,'update'])->name('update_user');

 Route::get('/delete_user/{id}',[UserController ::class,'delete'])->name('delete_user');
 Route::post('/destroy_user',[UserController ::class,'destroy'])->name('destroy_user');

 Route::get('user_subjects/{id}',[UserController::class,'user_subjects'])->name('user_subjects');
 Route::get('add_user_subject/{id}',[UserController::class,'add_user_subject'])->name('add_user_subject');
 deguzman
// bobo
//  LALALALA
// JANJCNJA

