<?php

use App\Http\Controllers\admin\assignmentController;
use App\Http\Controllers\admin\attendanceController;
use App\Http\Controllers\admin\chatController;
use App\Http\Controllers\admin\class_schedulrController;
use App\Http\Controllers\admin\classes_sectionsController;
use App\Http\Controllers\admin\departmentController as AdminDepartmentController;
use App\Http\Controllers\admin\employeeController;
use App\Http\Controllers\admin\eventController;
use App\Http\Controllers\admin\GradelevelsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\mediaAlbomController;
use App\Http\Controllers\admin\meetimgController;
use App\Http\Controllers\admin\OfficeController;
use App\Http\Controllers\admin\parentController;
use App\Http\Controllers\admin\settingsController;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\admin\subjectController;
use App\Http\Controllers\admin\teacherController as AdminTeacherController;
use App\Http\Controllers\admin\vacationController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\teacher\TeacherController;
use App\Models\assignment;
use Illuminate\Http\Request;
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
// ['middleware' => ['isAdmin']],
Route::get('/', [LoginController::class, 'index']);
Route::get('/resetpassword', [LoginController::class, 'resetPassword']);
Route::get('/terms', [LoginController::class, 'terms']);
Route::get('/visitors', [OfficeController::class, 'Visitors']);
Route::get('/phone_calls', [OfficeController::class, 'Phone']);
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/materials', [subjectController::class, 'Materials']);
    Route::get('/materials/{id}', [subjectController::class, 'getMaterials']);
    Route::get('/materials/create/{subject}', [subjectController::class, 'create']);
    Route::get('/materials/create/getSection/{id}', [subjectController::class, 'getSection']);
    Route::post('/materials/store', [subjectController::class, 'submit']);
    Route::get('/materials/update/{id}', [subjectController::class, 'update']);
    Route::post('/materials/edit', [subjectController::class, 'edit']);
    Route::get('/materials/delete/{id}', [subjectController::class, 'remove']);
    Route::get('/student', [studentController::class, 'getStudent'])->name('admin.student');
    Route::get('/active_student/{id}', [studentController::class, 'activation']);
    Route::get('/student/create', [studentController::class, 'create']);
    Route::post('/student/submit', [studentController::class, 'submit']);
    Route::get('/student/filter', [studentController::class, 'filter']);
    Route::get('/student/edit/{id}', [studentController::class, 'edit']);
    Route::post('/student/update/{id}', [studentController::class, 'update']);
    Route::get('/student/delete/{id}', [studentController::class, 'delete']);
    Route::get('/student/attendace/{id}', [studentController::class, 'attendace']);
    Route::get('/sections/{id}', [studentController::class, 'sections']);
    Route::get('/apiStudent/{gender}/{class}/{section}', [studentController::class, 'studentApi']);
    Route::get('/edit_active/{id}', [studentController::class, 'editActive']);
    Route::get('/subjects', [subjectController::class, 'getSubject']);
    Route::get('/addsubject', [subjectController::class, 'addSubject']);
    Route::post('/subject/store', [subjectController::class, 'store']);
    Route::post('/subject/set_teacher', [subjectController::class, 'setTeacher']);
    Route::get('/subject/get_teacher/{id}', [subjectController::class, 'getTeacher']);
    Route::get('teacher', [AdminTeacherController::class, 'index']);
    Route::get('teacher/create', [AdminTeacherController::class, 'addTeacher']);
    Route::post('/teacher/store', [AdminTeacherController::class, 'store']);
    Route::post('/teacher/leaderboard', [AdminTeacherController::class, 'leaderBoard']);
    Route::get('/teacher/delete_leader/{id}', [AdminTeacherController::class, 'deleteLeader']);
    Route::get('/teacher/active/{id}', [AdminTeacherController::class, 'editActive']);
    Route::get('/teacher/edit/{id}', [AdminTeacherController::class, 'editTeacher']);
    Route::post('/teacher/update', [AdminTeacherController::class, 'uptate']);
    Route::get('/teacher/delete/{id}', [AdminTeacherController::class, 'delete']);
    Route::get('/teacher/delete/{id}', [AdminTeacherController::class, 'delete']);
    Route::get('/teacher/search', [AdminTeacherController::class, 'searchGender']);
    Route::get('/teacher/filters', [AdminTeacherController::class, 'searchGender']);
    Route::get('employee', [employeeController::class, 'index']);
    Route::get('/employee/active/{id}', [employeeController::class, 'editActive']);
    Route::get('/employee/create', [employeeController::class, 'addEmployee']);
    Route::post('/employee/store', [employeeController::class, 'store']);
    Route::get('/employee/edit/{id}', [employeeController::class, 'edit']);
    Route::post('/employee/update', [employeeController::class, 'update']);
    Route::get('/department', [AdminDepartmentController::class, 'index']);
    Route::get('/department/create', [AdminDepartmentController::class, 'create']);
    Route::post('department/store', [AdminDepartmentController::class, 'store']);
    Route::post('department/update', [AdminDepartmentController::class, 'update']);
    Route::get('class_schedulr', [class_schedulrController::class, 'index']);
    Route::get('class_schedulr/timetable/{id}', [class_schedulrController::class, 'timetable']);
    Route::post('class_schedulr/submit', [class_schedulrController::class, 'submit']);
    Route::post('class_schedulr/update', [class_schedulrController::class, 'update']);
    Route::get('class_schedulr/delete', [class_schedulrController::class, 'remove']);
    Route::get('settings', [settingsController::class, 'index']);
    Route::post('settings/profile', [settingsController::class, 'editProfile']);
    Route::post('settings/email', [settingsController::class, 'editEmail']);
    Route::post('settings/password', [settingsController::class, 'editPassword']);
    Route::get('Gradelevels', [GradelevelsController::class, 'index']);
    Route::post('Gradelevels/create', [GradelevelsController::class, 'create']);
    Route::post('Gradelevels/update', [GradelevelsController::class, 'update']);
    Route::get('Gradelevels/remove/{id}', [GradelevelsController::class, 'remove']);
    Route::get('event', [eventController::class, 'index']);
    Route::get('event/create', [eventController::class, 'create']);
    Route::post('event/submit', [eventController::class, 'submit']);
    Route::get('event/active/{id}', [eventController::class, 'active']);
    Route::get('event/edit/{id}', [eventController::class, 'edit']);
    Route::post('event/update', [eventController::class, 'update']);
    Route::get('event/remove/{id}', [eventController::class, 'remove']);
    Route::get('event/show/{id}', [eventController::class, 'show']);
    Route::get('meeting', [meetimgController::class, 'index']);
    Route::get('meeting/create', [meetimgController::class, 'create']);
    Route::get('meeting/filter', [meetimgController::class, 'filter']);
    Route::post('meeting/submit', [meetimgController::class, 'submit']);
    Route::get('meeting/sections/{id}', [meetimgController::class, 'sections']);
    Route::get('meeting/update/{id}', [meetimgController::class, 'update']);
    Route::post('meeting/edit', [meetimgController::class, 'edit']);
    Route::get('meeting/delete/{id}', [meetimgController::class, 'delete']);
    Route::get('attendance', [attendanceController::class, 'index']);
    Route::get('attendance/take_attendance', [attendanceController::class, 'takeAttendance']);
    Route::post('attendance/click', [attendanceController::class, 'submit']);
    Route::get('attendance/staff', [attendanceController::class, 'staffIndex']);
    Route::get('attendance/take_staff', [attendanceController::class, 'takeStaff']);
    Route::post('attendance/staff_submit', [attendanceController::class, 'staffSubmit']);
    Route::get('attendance/report', [attendanceController::class, 'report']);
    Route::post('attendance/report_details', [attendanceController::class, 'details']);
    Route::get('chat', [chatController::class, 'index']);
    Route::get('chat/create', [chatController::class, 'create']);
    Route::post('chat/submit', [chatController::class, 'submit']);
    Route::get('chat/message/{id}/{id_to}', [chatController::class, 'message']);
    Route::get('/chat/setmessage/{idChat}/{idTo}/{msg}', [chatController::class, 'setNew']);
    Route::get('/parent', [parentController::class, 'index']);
    Route::get('/parent/create', [parentController::class, 'create']);
    Route::POST('/parent/submit', [parentController::class, 'submit']);
    Route::get('assignments',[assignmentController::class,'index']);
    Route::get('assignments/create',[assignmentController::class,'create']);
    Route::post('assignments/submit',[assignmentController::class,'submit']);
    Route::get('assignments/edit/{id}',[assignmentController::class,'edit']);
    Route::post('assignments/update/{id}',[assignmentController::class,'update']);
    Route::get('assignments/delete/{id}',[assignmentController::class,'delete']);
    Route::get('classes',[classes_sectionsController::class,'classes']);
    Route::get('classes/create',[classes_sectionsController::class,'create']);
    Route::POST('classes/submit',[classes_sectionsController::class,'submit']);
    Route::get('classes/edit/{id}',[classes_sectionsController::class,'edit']);
    Route::post('classes/update/{id}',[classes_sectionsController::class,'update']);
    Route::get('classes/delete/{id}',[classes_sectionsController::class,'delete']);
    Route::get('section',[classes_sectionsController::class,'section']);
    Route::get('section/insert',[classes_sectionsController::class,'insert']);
    Route::post('section/submitSection',[classes_sectionsController::class,'submitSection']);
    Route::get('section/edit/{id}',[classes_sectionsController::class,'editSection']);
    Route::post('section/editSection/{id}',[classes_sectionsController::class,'edit_section']);
    Route::get('section/deleteSection/{id}',[classes_sectionsController::class,'deleteSection']);
    Route::get('vacation/request',[vacationController::class,'request']);
    Route::post('vacation/submit',[vacationController::class,'submit']);
    Route::get('vacation/approve',[vacationController::class,'approve']);
    Route::get('vacation/approve_vacation/{id}/{aprove}',[vacationController::class,'approveVacation']);
    Route::get('vacation/my_vacations',[vacationController::class,'myVacations']);
    Route::get('media',[mediaAlbomController::class,'index']);
    Route::get('media/upload',[mediaAlbomController::class,'upload']);
    Route::post('media/submit_upload',[mediaAlbomController::class,'submitUpload']);
    Route::get('media/show/{id}',[mediaAlbomController::class,'show']);
    Route::get('media/edit/{id}',[mediaAlbomController::class,'edit']);
    Route::post('media/submit_edit/{id}',[mediaAlbomController::class,'updata']);
    Route::get('media/delete/{id}',[mediaAlbomController::class,'delete']);
    Route::get('item/create',[mediaAlbomController::class,'create']);
    Route::post('item/submit_item',[mediaAlbomController::class,'submitItem']);
    Route::get('item/show/{id}',[mediaAlbomController::class,'showItem']);
    Route::get('item/edit/{id}',[mediaAlbomController::class,'editItem']);











});


Route::prefix('teacher')->middleware(['auth', 'isTeacher'])->group(function () {
    Route::get('/', [TeacherController::class, 'index']);
});
