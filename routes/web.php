<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

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
Route::get('/home', function () {
    return view('home');
})->middleware('auth');

/* Route::get('profile', function () {
    return view('profile');
})->middleware('auth'); */

//Users
Route::get('/profile', [UserController::class,'profileData'])->middleware('auth');
Route::post('/profile', [UserController::class,'updateProfile']);
Route::get('/password/change',[UserController::class,'getPassword'])->middleware('auth');
Route::post('/password/change',[UserController::class,'postPassword'])->middleware('auth');

//Permissions
Route::get('/permissions',[PermissionController::class,'index'])->middleware('auth');
Route::get('/permission/create',[PermissionController::class,'create'])->middleware('auth');
Route::post('/permission/store',[PermissionController::class,'store'])->middleware('auth');
Route::get('/permission/edit/{id}',[PermissionController::class,'store'])->middleware('auth');
Route::get('/permission/delete/{id}',[PermissionController::class,'store'])->middleware('auth');
