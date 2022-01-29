<?php

use App\Http\Controllers\admin\assignmentController;
use App\Http\Controllers\admin\attendanceController;
use App\Http\Controllers\admin\chatController;
use App\Http\Controllers\admin\class_schedulrController;
use App\Http\Controllers\admin\classes_sectionsController;
use App\Http\Controllers\admin\databaseController as AdminDatabaseController;
use App\Http\Controllers\admin\departmentController as AdminDepartmentController;
use App\Http\Controllers\admin\employeeController;
use App\Http\Controllers\admin\eventController;
use App\Http\Controllers\admin\examController;
use App\Http\Controllers\admin\GradelevelsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\levelController;
use App\Http\Controllers\admin\mediaAlbomController;
use App\Http\Controllers\admin\meetimgController;
use App\Http\Controllers\admin\OfficeController;
use App\Http\Controllers\admin\parentController;
use App\Http\Controllers\admin\questionsController;
use App\Http\Controllers\admin\recordController;
use App\Http\Controllers\admin\roleController;
use App\Http\Controllers\admin\ruleController;
use App\Http\Controllers\admin\settingsController;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\admin\subjectController;
use App\Http\Controllers\admin\teacherController as AdminTeacherController;
use App\Http\Controllers\admin\vacationController;
use App\Http\Controllers\admin\virtualClassController;
use App\Http\Controllers\databaseController;
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




Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name("home");
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

        /**************************start subjects ****************** */
        Route::group(['prefix' => 'subjects'], function () {
            Route::get('/', [subjectController::class, 'index'])->middleware('can:Subjects_list');
            Route::get('/addsubject', [subjectController::class, 'addSubject'])->middleware('can:Subjects_addSubject');
            Route::post('/store', [subjectController::class, 'store'])->middleware('can:Subjects_addSubject');
            Route::post('/set_teacher', [subjectController::class, 'setTeacher'])->middleware('can:Subjects_editSubject');
            Route::get('/get_teacher/{id}', [subjectController::class, 'getTeacher'])->middleware('can:Subjects_editSubject');
        });
        /**************************end subjects ****************** */



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
        /*************************** start employee ************* */
        Route::group(['prefix' => 'employee'], function () {
            Route::get('/', [employeeController::class, 'index'])->middleware("can:employees_list");
            Route::get('/active/{id}', [employeeController::class, 'editActive'])->middleware("can:employees_editEmployee");
            Route::get('/create', [employeeController::class, 'addEmployee'])->middleware("can:employees_addEmployee");
            Route::post('/store', [employeeController::class, 'store'])->middleware("can:employees_addEmployee");
            Route::get('/edit/{id}', [employeeController::class, 'edit'])->middleware("can:employees_editEmployee");
            Route::post('/update', [employeeController::class, 'update'])->middleware("can:employees_editEmployee");
        });
        /*************************** end employee ************* */

        /*************************** start department ************* */
        Route::group(['prefix' => 'department'], function () {
            Route::get('/', [AdminDepartmentController::class, 'index'])->middleware("can:depart_list");
            Route::get('/create', [AdminDepartmentController::class, 'create'])->middleware("can:depart_add_depart");
            Route::post('/store', [AdminDepartmentController::class, 'store'])->middleware("can:depart_add_depart");
            Route::post('/update', [AdminDepartmentController::class, 'update'])->middleware("can:depart_edit_depart");
        });
        /*************************** end department ************* */

        /*************************** start class_schedule ************* */
        Route::group(['prefix' => 'class_schedulr'], function () {
            Route::get('/', [class_schedulrController::class, 'index'])->middleware("can:classSch_list");;
            Route::get('/timetable/{id}', [class_schedulrController::class, 'timetable'])->middleware("can:classSch_list");
            Route::post('/submit', [class_schedulrController::class, 'submit'])->middleware("can:classSch_addSch");
            Route::post('/update', [class_schedulrController::class, 'update'])->middleware("can:classSch_editSch");
            Route::get('/delete', [class_schedulrController::class, 'remove'])->middleware("can:classSch_delSch");
        });

        /*************************** end class_schedule ************* */
        /*************************** start settings ************* */
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/', [settingsController::class, 'index']);
            Route::post('/profile', [settingsController::class, 'editProfile']);
            Route::post('/email', [settingsController::class, 'editEmail']);
            Route::post('/password', [settingsController::class, 'editPassword']);
        });

        /*************************** end settings ************* */
        /*************************** start Gradelevels ************* */
        Route::group(['prefix' => 'Gradelevels'], function () {
            Route::get('/', [GradelevelsController::class, 'index'])->middleware("can:gradeLevels_list");
            Route::post('/create', [GradelevelsController::class, 'create'])->middleware("can:gradeLevels_addLevel");
            Route::post('/update', [GradelevelsController::class, 'update'])->middleware("can:gradeLevels_editGrade");
            Route::get('/remove/{id}', [GradelevelsController::class, 'remove'])->middleware("can:gradeLevels_delGradeLevel");
        });

        /*************************** end Gradelevels ************* */
        /*************************** start event ************* */
        Route::group(['prefix' => 'event'], function () {
            Route::get('/', [eventController::class, 'index'])->name("event")->middleware("can:events_list");
            Route::get('/create', [eventController::class, 'create'])->middleware("can:events_addEvent");
            Route::post('/submit', [eventController::class, 'submit'])->middleware("can:events_addEvent");
            Route::get('/active/{id}', [eventController::class, 'active'])->middleware("can:events_View");
            Route::get('/edit/{id}', [eventController::class, 'edit'])->middleware("can:events_editEvent");
            Route::post('/update', [eventController::class, 'update'])->middleware("can:events_editEvent");
            Route::get('/remove/{id}', [eventController::class, 'remove'])->middleware("can:events_delEvent");
            Route::get('/show/{id}', [eventController::class, 'show'])->middleware("can:events_delEvent");
        });

        /*************************** end event ************* */

        /**************************start meeting ****************** */
        Route::group(['prefix' => 'meeting'], function () {
            Route::get('/', [meetimgController::class, 'index'])->middleware('can:Meetings_list');
            Route::get('/create', [meetimgController::class, 'create'])->middleware('can:Meetings_addMeeting');
            Route::get('/filter', [meetimgController::class, 'filter'])->middleware('can:Meetings_list');
            Route::post('/submit', [meetimgController::class, 'submit'])->middleware('can:Meetings_addMeeting');
            Route::get('/sections/{id}', [meetimgController::class, 'sections'])->middleware('can:Meetings_list');
            Route::get('/update/{id}', [meetimgController::class, 'update'])->middleware('can:Meetings_editMeeting');
            Route::post('/edit', [meetimgController::class, 'edit'])->middleware('can:Meetings_editMeeting');
            Route::get('/delete/{id}', [meetimgController::class, 'delete'])->middleware('can:Meetings_delMeet');
        });

        /**************************end meeting ****************** */
        /**************************start attendance ****************** */

        Route::group(['prefix' => 'attendance'], function () {
            Route::get('/', [attendanceController::class, 'index'])->middleware("can:Attendance_takeAttendance");
            Route::get('/take_attendance', [attendanceController::class, 'takeAttendance'])->middleware("can:Attendance_takeAttendance");
            Route::post('/click', [attendanceController::class, 'submit'])->middleware("can:Attendance_takeAttendance");
            Route::get('/report', [attendanceController::class, 'report'])->middleware("can:Attendance_attReport");
            Route::post('/report_details', [attendanceController::class, 'details'])->middleware("can:Attendance_attReport");
            Route::get('/staff', [attendanceController::class, 'staffIndex'])->middleware("can:staffAttendance_takeAttendance");
            Route::get('/take_staff', [attendanceController::class, 'takeStaff'])->middleware("can:staffAttendance_takeAttendance");
            Route::post('/staff_submit', [attendanceController::class, 'staffSubmit'])->middleware("can:staffAttendance_takeAttendance");
        });

        /**************************end attendance ****************** */
        /**************************start chat ****************** */
        Route::group(['prefix' => 'chat'], function () {
            Route::get('/', [chatController::class, 'index']);
            Route::get('/create', [chatController::class, 'create']);
            Route::post('/submit', [chatController::class, 'submit']);
            Route::get('/message/{id}/{id_to}', [chatController::class, 'message']);
            Route::get('/setmessage/{idChat}/{idTo}/{msg}', [chatController::class, 'setNew']);
        });

        /**************************end chat ****************** */

        /**************************start parent ****************** */
        Route::group(['prefix' => 'parent'], function () {
            Route::get('/', [parentController::class, 'index'])->middleware("can:parents_list");;
            Route::get('/create', [parentController::class, 'create'])->middleware("can:parents_AddParent");
            Route::POST('/submit', [parentController::class, 'submit'])->middleware("can:parents_AddParent");
        });
        /**************************end parent ****************** */
        /**************************start assignments ****************** */
        Route::group(['prefix' => 'assignments'], function () {
            Route::get('/', [assignmentController::class, 'index'])->middleware("can:Assignments_list");
            Route::get('/create', [assignmentController::class, 'create']);
            Route::post('/submit', [assignmentController::class, 'submit']);
            Route::get('/edit/{id}', [assignmentController::class, 'edit']);
            Route::post('/update/{id}', [assignmentController::class, 'update']);
            Route::get('/delete/{id}', [assignmentController::class, 'delete']);
        });

        /**************************end assignments ****************** */
        /**************************start classes ****************** */
        Route::group(['prefix' => 'classes'], function () {
            Route::get('/', [classes_sectionsController::class, 'classes'])->middleware("can:classes_list");
            Route::get('/create', [classes_sectionsController::class, 'create'])->middleware("can:classes_addClass");
            Route::POST('/submit', [classes_sectionsController::class, 'submit'])->middleware("can:classes_addClass");
            Route::get('/edit/{id}', [classes_sectionsController::class, 'edit'])->middleware("can:classes_editClass");
            Route::post('/update/{id}', [classes_sectionsController::class, 'update'])->middleware("can:classes_editClass");
            Route::get('/delete/{id}', [classes_sectionsController::class, 'delete'])->middleware("can:classes_delClass");
        });
        /**************************end classes ****************** */
        /**************************start section ****************** */
        Route::group(['prefix' => 'section'], function () {
            Route::get('/', [classes_sectionsController::class, 'section'])->middleware("can:sections_list");
            Route::get('/insert', [classes_sectionsController::class, 'insert'])->middleware("can:classes_addClass");
            Route::post('/submitSection', [classes_sectionsController::class, 'submitSection'])->middleware("can:classes_addClass");
            Route::get('/edit/{id}', [classes_sectionsController::class, 'editSection'])->middleware("can:classes_editClass");
            Route::post('/editSection/{id}', [classes_sectionsController::class, 'edit_section'])->middleware("can:classes_editClass");
            Route::get('/deleteSection/{id}', [classes_sectionsController::class, 'deleteSection'])->middleware("can:classes_delClass");
        });
        /**************************end section ****************** */
        /************* start  vacation ***************/
        Route::group(['prefix' => 'vacation'], function () {
            Route::get('/request', [vacationController::class, 'request'])->middleware("can:Vacation_reqVacation");
            Route::post('/submit', [vacationController::class, 'submit'])->middleware("Vacation_reqVacation");
            Route::get('/approve', [vacationController::class, 'approve'])->middleware("Vacation_appVacation");
            Route::get('/approve_vacation/{id}/{aprove}', [vacationController::class, 'approveVacation'])->middleware("Vacation_appVacation");
            Route::get('/my_vacations', [vacationController::class, 'myVacations'])->middleware("Vacation_myVacation");
        });
        /************* end  vacation ***************/


        Route::get('media', [mediaAlbomController::class, 'index']);
        Route::get('media/upload', [mediaAlbomController::class, 'upload']);
        Route::post('media/submit_upload', [mediaAlbomController::class, 'submitUpload']);
        Route::get('media/show/{id}', [mediaAlbomController::class, 'show']);
        Route::get('media/edit/{id}', [mediaAlbomController::class, 'edit']);
        Route::post('media/submit_edit/{id}', [mediaAlbomController::class, 'updata']);
        Route::get('media/delete/{id}', [mediaAlbomController::class, 'delete']);
        Route::get('item/create', [mediaAlbomController::class, 'create']);
        Route::post('item/submit_item', [mediaAlbomController::class, 'submitItem']);
        Route::get('item/show/{id}', [mediaAlbomController::class, 'showItem']);
        Route::get('item/edit/{id}', [mediaAlbomController::class, 'editItem']);
        Route::get('virtual_Class', [virtualClassController::class, 'index']);
        Route::get('virtual_Class/timetable/{id}', [virtualClassController::class, 'timetable']);

        Route::prefix('level')->group(function () {
            Route::get('/', [examController::class, 'index'])->name("level");
            Route::get('/create', [examController::class, 'create'])->name("level.create");
            Route::post('/submit', [examController::class, 'submit'])->name("level.submit");
            Route::get('/edit/{id}', [examController::class, 'edit'])->name("level.edit");
            Route::post('/update/{id}', [examController::class, 'update'])->name("level.update");
            Route::get('/view/{id}', [examController::class, 'view'])->name("level.view");
        });

        Route::prefix('questions')->group(function () {
            Route::get('/', [questionsController::class, 'index'])->name("questions");
            Route::get('/create', [questionsController::class, 'create'])->name("questions.create");
            Route::post('/choices', [questionsController::class, 'choices'])->name("questions.choices");
            Route::post('/correction', [questionsController::class, 'correction'])->name("questions.correction");
            Route::post('/recording', [questionsController::class, 'recording'])->name("questions.recording");
            Route::post('/vedio', [questionsController::class, 'vedio'])->name("questions.vedio");
            Route::post('/reading', [questionsController::class, 'reading'])->name("questions.reading");
        });
        Route::prefix('exam')->group(function () {
            Route::get('/', [levelController::class, 'index'])->name("exam");
            Route::get('/show/{id}', [levelController::class, 'show'])->name("exam.show");
            Route::post('/submit/{id}', [levelController::class, 'submit'])->name("exam.submit");
        });

        Route::group(['prefix' => 'role'], function () {
            Route::get('/', [roleController::class, 'index'])->name("role")->middleware('can:roles_list');
            Route::get('/create', [roleController::class, 'create'])->name("role.create")->middleware('can:roles_add_role');
            Route::post('/submit', [roleController::class, 'submit'])->name("role.submit")->middleware('can:roles_add_role');
            Route::get('/edit/{id}', [roleController::class, 'edit'])->name("role.edit")->middleware('can:roles_modify_role');
            Route::post('/update/{id}', [roleController::class, 'update'])->name("role.update")->middleware('can:roles_modify_role');
        });

        // dbExport_dbExport
        Route::group(['prefix' => 'database', 'middleware' => 'can:dbExport_dbExport'], function () {
            Route::get('/', [AdminDatabaseController::class, 'index'])->name("database");
            Route::get('/our_backup_database', [AdminDatabaseController::class, 'our_backup_database'])->name('our_backup_database');
        });
















        Route::get('record', [recordController::class, 'index']);
        Route::get('record/send', [recordController::class, 'send']);
    });
});


Route::prefix('teacher')->middleware(['auth', 'isTeacher'])->group(function () {
    Route::get('/', [TeacherController::class, 'index']);
});
