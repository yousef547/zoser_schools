<?php

use App\Http\Controllers\admin\departmentController as AdminDepartmentController;
use App\Http\Controllers\admin\employeeController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\OfficeController;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\admin\subjectController;
use App\Http\Controllers\admin\teacherController as AdminTeacherController;
use App\Http\Controllers\departmentController;
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
    Route::post('/teacher/leaderboard',[AdminTeacherController::class,'leaderBoard']);
    Route::get('/teacher/delete_leader/{id}',[AdminTeacherController::class,'deleteLeader']);
    Route::get('/teacher/active/{id}',[AdminTeacherController::class,'editActive']);
    Route::get('/teacher/edit/{id}',[AdminTeacherController::class,'editTeacher']);
    Route::post('/teacher/update',[AdminTeacherController::class,'uptate']);
    Route::get('/teacher/delete/{id}',[AdminTeacherController::class,'delete']);
    Route::get('/teacher/delete/{id}',[AdminTeacherController::class,'delete']);
    Route::get('/teacher/search',[AdminTeacherController::class,'searchGender']);
    Route::get('/teacher/filters',[AdminTeacherController::class,'searchGender']);

    
    Route::get('employee',[employeeController::class,'index']);
    Route::get('/employee/active/{id}',[employeeController::class,'editActive']);
    Route::get('/employee/create',[employeeController::class,'addEmployee']);    
    Route::post('/employee/store',[employeeController::class,'store']);
    Route::get('/employee/edit/{id}',[employeeController::class,'edit']);
    Route::post('/employee/update',[employeeController::class,'update']);
    Route::get('/department',[AdminDepartmentController::class,'index']);
    Route::get('/department/create',[AdminDepartmentController::class,'create']);    
    Route::post('department/store',[AdminDepartmentController::class,'store']);
    Route::post('department/update',[AdminDepartmentController::class,'update']);

















});
Route::prefix('teacher')->middleware(['auth','isTeacher'])->group(function (){
    Route::get('/',[TeacherController::class,'index']);
});