<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\OfficeController;
use App\Http\Controllers\login\LoginController;
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
    return view('welcome');
});


Route::get('/home',[HomeController::class,'index']);
Route::get('/resetpassword',[LoginController::class,'resetPassword']);
Route::get('/terms',[LoginController::class,'terms']);
Route::get('/visitors',[OfficeController::class,'Visitors']);
Route::get('/phone_calls',[OfficeController::class,'Phone']);




