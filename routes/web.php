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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.home');
Route::get('/about', [App\Http\Controllers\UserController::class, 'about'])->name('user.about');
Route::get('/blog-details', [App\Http\Controllers\UserController::class, 'blog_details'])->name('user.blog_details');
Route::get('/blogs', [App\Http\Controllers\UserController::class, 'blogs'])->name('user.blogs');
Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('user.contact');
Route::get('/gallery', [App\Http\Controllers\UserController::class, 'gallery'])->name('user.gallery');
Route::get('/package-details', [App\Http\Controllers\UserController::class, 'package_details'])->name('user.package_details');
Route::get('/packages', [App\Http\Controllers\UserController::class, 'packages'])->name('user.packages');
Route::get('/privacy-policy', [App\Http\Controllers\UserController::class, 'privacy_policy'])->name('user.privacy_policy');
Route::get('/terms-and-conditions', [App\Http\Controllers\UserController::class, 'terms_and_conditions'])->name('user.terms_and_conditions');
Route::get('/visa', [App\Http\Controllers\UserController::class, 'visa'])->name('user.visa');
Route::get('/visa-details', [App\Http\Controllers\UserController::class, 'visa_details'])->name('user.visa_details');
