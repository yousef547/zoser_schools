<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\OfficeController;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\admin\subjectController;
use App\Http\Controllers\admin\teacherController as AdminTeacherController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\teacher\TeacherController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[LoginController::class,'index']);
Route::get('/resetpassword',[LoginController::class,'resetPassword']);
Route::get('/terms',[LoginController::class,'terms']);
Route::get('/visitors',[OfficeController::class,'Visitors']);
Route::get('/phone_calls',[OfficeController::class,'Phone']);

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('/',[HomeController::class,'index']);
    Route::get('/materials',[subjectController::class,'Materials']);
    Route::get('/materials/{id}',[subjectController::class,'getMaterials']);
    Route::get('/student',[studentController::class,'getStudent'])->name('admin.student');
    Route::get('/active_student/{id}',[studentController::class,'activation']);
    Route::get('/sections/{id}',[studentController::class,'sections']);
    Route::get('/apiStudent/{gender}/{class}/{section}',[studentController::class,'studentApi']);
    Route::get('/edit_active/{id}',[studentController::class,'editActive']);
    Route::get('/subjects',[subjectController::class,'getSubject']);
    Route::get('/addsubject',[subjectController::class,'addSubject']);
    Route::post('/subject/store',[subjectController::class,'store']);
    Route::post('/subject/set_teacher',[subjectController::class,'setTeacher']);
    Route::get('/subject/get_teacher/{id}',[subjectController::class,'getTeacher']);  
    Route::get('teacher',[AdminTeacherController::class,'index']);
    Route::get('teacher/create',[AdminTeacherController::class,'addTeacher']);    
    Route::post('/teacher/store',[AdminTeacherController::class,'store']);



});
Route::prefix('teacher')->middleware(['auth','isTeacher'])->group(function (){
    Route::get('/',[TeacherController::class,'index']);
});