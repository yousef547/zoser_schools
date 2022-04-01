<?php

use App\Http\Controllers\admin\assignmentController;
use App\Http\Controllers\admin\attendanceController;
use App\Http\Controllers\admin\boardController;
use App\Http\Controllers\admin\catehostelController;
use App\Http\Controllers\admin\chatController;
use App\Http\Controllers\admin\class_schedulrController;
use App\Http\Controllers\admin\classes_sectionsController;
use App\Http\Controllers\admin\databaseController as AdminDatabaseController;
use App\Http\Controllers\admin\departmentController as AdminDepartmentController;
use App\Http\Controllers\admin\employeeController;
use App\Http\Controllers\admin\eventController;
use App\Http\Controllers\admin\examController;
use App\Http\Controllers\admin\examsController;
use App\Http\Controllers\admin\finalexamContoller;
use App\Http\Controllers\admin\GradelevelsController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\hostelController;
use App\Http\Controllers\admin\languagesController;
use App\Http\Controllers\admin\levelController;
use App\Http\Controllers\admin\leveltestContoller;
use App\Http\Controllers\admin\mediaAlbomController;
use App\Http\Controllers\admin\meetimgController;
use App\Http\Controllers\admin\OfficeController;
use App\Http\Controllers\admin\parentController;
use App\Http\Controllers\admin\questionsController;
use App\Http\Controllers\admin\recordController;
use App\Http\Controllers\admin\reportController;
use App\Http\Controllers\admin\reportsController;
use App\Http\Controllers\admin\roleController;
use App\Http\Controllers\admin\ruleController;
use App\Http\Controllers\admin\settingsController;
use App\Http\Controllers\admin\static_pagesContoller;
use App\Http\Controllers\admin\studentController;
use App\Http\Controllers\admin\subjectController;
use App\Http\Controllers\admin\teacherController as AdminTeacherController;
use App\Http\Controllers\admin\testexamContoller;
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
        /**************************start materials ****************** */
        Route::group(['prefix' => 'materials'], function () {
            Route::get('/', [subjectController::class, 'Materials'])->middleware("can:studyMaterial_list");
            Route::get('/{id}', [subjectController::class, 'getMaterials'])->middleware("can:studyMaterial_list");
            Route::get('/create/{subject}', [subjectController::class, 'create'])->middleware("can:studyMaterial_addMaterial");
            Route::get('/create/getSection/{id}', [subjectController::class, 'getSection'])->middleware("can:studyMaterial_list");
            Route::post('/store', [subjectController::class, 'submit'])->middleware("can:studyMaterial_addMaterial");
            Route::get('/update/{id}', [subjectController::class, 'update'])->middleware("can:studyMaterial_editMaterial");
            Route::post('/edit', [subjectController::class, 'edit'])->middleware("can:studyMaterial_editMaterial");
            Route::get('/delete/{id}', [subjectController::class, 'remove'])->middleware("can:studyMaterial_delMaterial`");
        });
        /************************** end materials ****************** */

        /**************************start student ****************** */
        Route::group(['prefix' => 'student'], function () {
            Route::get('/', [studentController::class, 'getStudent'])->name('admin.student')->middleware("can:students_list");
            Route::get('/create', [studentController::class, 'create'])->middleware("can:students_admission");
            Route::post('/submit', [studentController::class, 'submit'])->middleware("can:students_admission");
            Route::get('/filter', [studentController::class, 'filter'])->middleware("can:students_list");
            Route::get('/edit/{id}', [studentController::class, 'edit'])->middleware("can:students_editStudent");
            Route::post('/update/{id}', [studentController::class, 'update'])->middleware("can:students_editStudent");
            Route::get('/delete/{id}', [studentController::class, 'delete'])->middleware("can:students_delStudent");
            Route::get('/attendace/{id}', [studentController::class, 'attendace'])->middleware("can:students_list");
            Route::get('/sections/{id}', [studentController::class, 'sections'])->middleware("can:students_list");
            Route::get('/deleteLeader/{id}', [AdminTeacherController::class, 'deleteLeader'])->name("student.deleteLeader")->middleware("can:students_stdLeaderBoard");
            Route::post('/leaderboard', [AdminTeacherController::class, 'leaderBoard'])->name("student.leaderboard")->middleware("can:students_stdLeaderBoard");
        });
        Route::get('/active_student/{id}', [studentController::class, 'activation'])->middleware("can:students_Approve");
        Route::get('/apiStudent/{gender}/{class}/{section}', [studentController::class, 'studentApi'])->middleware("can:students_list");
        Route::get('/edit_active/{id}', [studentController::class, 'editActive'])->middleware("can:students_list");
        /**************************end student ****************** */


        /**************************start subjects ****************** */
        Route::group(['prefix' => 'subjects'], function () {
            Route::get('/', [subjectController::class, 'index'])->middleware('can:Subjects_list');
            Route::get('/addsubject', [subjectController::class, 'addSubject'])->middleware('can:Subjects_addSubject');
            Route::post('/store', [subjectController::class, 'store'])->middleware('can:Subjects_addSubject');
            Route::post('/set_teacher', [subjectController::class, 'setTeacher'])->middleware('can:Subjects_editSubject');
            Route::get('/get_teacher/{id}', [subjectController::class, 'getTeacher'])->middleware('can:Subjects_editSubject');
        });
        /**************************end subjects ****************** */

        /*************************** start teacher ************* */

        Route::group(['prefix' => 'teacher'], function () {
            Route::get('/', [AdminTeacherController::class, 'index'])->middleware("can:teachers_list");
            Route::get('/create', [AdminTeacherController::class, 'addTeacher'])->middleware("can:teachers_addTeacher");
            Route::post('/store', [AdminTeacherController::class, 'store'])->middleware("can:teachers_addTeacher");
            Route::post('/leaderboard', [AdminTeacherController::class, 'leaderBoard'])->middleware("can:teachers_teacLeaderBoard");
            Route::get('/delete_leader/{id}', [AdminTeacherController::class, 'deleteLeader'])->middleware("can:teachers_teacLeaderBoard");
            Route::get('/active/{id}', [AdminTeacherController::class, 'editActive'])->middleware("can:teachers_Approve");
            Route::get('/edit/{id}', [AdminTeacherController::class, 'editTeacher'])->middleware("can:teachers_EditTeacher");
            Route::post('/update', [AdminTeacherController::class, 'uptate'])->middleware("can:teachers_EditTeacher");
            Route::get('/delete/{id}', [AdminTeacherController::class, 'delete'])->middleware("can:teachers_delTeacher");
            Route::get('/delete/{id}', [AdminTeacherController::class, 'delete'])->middleware("can:teachers_delTeacher");
            Route::get('/search', [AdminTeacherController::class, 'searchGender'])->middleware("can:teachers_list");
            Route::get('/filters', [AdminTeacherController::class, 'searchGender'])->middleware("can:teachers_list");
        });

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
            Route::post('/submit', [vacationController::class, 'submit'])->middleware("can:Vacation_reqVacation");
            Route::get('/approve', [vacationController::class, 'approve'])->middleware("can:Vacation_appVacation");
            Route::get('/approve_vacation/{id}/{aprove}', [vacationController::class, 'approveVacation'])->middleware("can:Vacation_appVacation");
            Route::get('/my_vacations', [vacationController::class, 'myVacations'])->middleware("can:Vacation_myVacation");
        });
        /************* end  vacation ***************/
        /************* start  media ***************/

        Route::group(['prefix' => 'media'], function () {
            Route::get('/', [mediaAlbomController::class, 'index'])->middleware("can:mediaCenter_View");
            Route::get('/upload', [mediaAlbomController::class, 'upload'])->middleware("can:mediaCenter_addAlbum");
            Route::post('/submit_upload', [mediaAlbomController::class, 'submitUpload'])->middleware("can:mediaCenter_addAlbum");
            Route::get('/show/{id}', [mediaAlbomController::class, 'show'])->middleware("can:mediaCenter_View");
            Route::get('/edit/{id}', [mediaAlbomController::class, 'edit'])->middleware("can:mediaCenter_editAlbum");
            Route::post('/submit_edit/{id}', [mediaAlbomController::class, 'updata'])->middleware("can:mediaCenter_editAlbum");
            Route::get('/delete/{id}', [mediaAlbomController::class, 'delete'])->middleware("can:mediaCenter_delAlbum");
        });
        /************* end  media ***************/

        /************* start  item ***************/
        Route::group(['prefix' => 'item'], function () {
            Route::get('/create', [mediaAlbomController::class, 'create'])->middleware("can:mediaCenter_addMedia");
            Route::post('/submit_item', [mediaAlbomController::class, 'submitItem'])->middleware("can:mediaCenter_addMedia");
            Route::get('/show/{id}', [mediaAlbomController::class, 'showItem'])->middleware("can:mediaCenter_editMedia");
            Route::get('/edit/{id}', [mediaAlbomController::class, 'editItem'])->middleware("can:mediaCenter_editMedia");
            Route::get('/delete/{id}', [mediaAlbomController::class, 'deleteItem'])->middleware("can:mediaCenter_delMedia");
        });
        /************* end  item ***************/
        /************* start  virtual_Class ***************/
        Route::prefix('virtual_Class')->group(function () {
            Route::get('/', [virtualClassController::class, 'index']);
            Route::get('/timetable/{id}', [virtualClassController::class, 'timetable']);
        });
        /************* end  virtual_Class ***************/
        /************* start  level ***************/

        Route::prefix('level')->group(function () {
            Route::get('/', [levelController::class, 'index'])->name("level")->middleware("can:level_show");
            Route::get('/create', [levelController::class, 'create'])->name("level.create")->middleware("can:level_create");
            Route::post('/submit', [levelController::class, 'submit'])->name("level.submit")->middleware("can:level_create");
            Route::get('/view/{id}', [levelController::class, 'view'])->name("level.view")->middleware("can:level_show_question");
            Route::get('/edit/{id}', [levelController::class, 'edit'])->name("level.edit")->middleware("can:level_edit");
            Route::post('/update/{id}', [levelController::class, 'update'])->name("level.update")->middleware("can:level_edit");
        });
        /************* end  level ***************/
        /********************* start level test *********************************/

        Route::prefix('level_test')->group(function () {
            Route::get('/', [leveltestContoller::class, 'index'])->name("level_test")->middleware("can:test_show");
            Route::post('submit', [leveltestContoller::class, 'submit'])->name("level_test.submit")->middleware("can:test_create");
            Route::get('add/{level}/{test}', [leveltestContoller::class, 'add'])->name("level_test.add")->middleware("can:test_add_questions");
            Route::post('addQusetions', [leveltestContoller::class, 'addQusetions'])->name("level_test.addQusetions")->middleware("can:test_add_questions");
            Route::get('show/{level}/{test}', [leveltestContoller::class, 'show'])->name("level_test.show")->middleware("can:test_show");
        });


        /********************* end level test *********************************/
        /************* start  questions ***************/
        Route::prefix('questions')->group(function () {
            Route::get('', [questionsController::class, 'index'])->name("questions")->middleware("can:question_show");
            Route::post('/choices', [questionsController::class, 'choices'])->name("questions.choices")->middleware("can:question_create");
            Route::post('/correction', [questionsController::class, 'correction'])->name("questions.correction")->middleware("can:question_create");
            Route::post('/recording', [questionsController::class, 'recording'])->name("questions.recording")->middleware("can:question_create");
            Route::post('/vedio', [questionsController::class, 'vedio'])->name("questions.vedio")->middleware("can:question_create");
            Route::post('/reading', [questionsController::class, 'reading'])->name("questions.reading")->middleware("can:question_create");
        });
        /************* end  questions ***************/
        /************* start  exam & report ***************/
        Route::prefix('exam')->middleware("can:examLevel_show")->group(function () {
            Route::get('/', [examsController::class, 'index'])->name("exam");
            Route::get('/test/{id}', [examsController::class, 'test'])->name("exam.test");
            Route::get('/show/{level}/{test}', [examsController::class, 'show'])->name("exam.show");
            Route::post('/submit/{level}/{test}', [examsController::class, 'submit'])->name("exam.submit");
        });

        Route::prefix('report')->group(function () {
            Route::get('/', [reportController::class, 'index'])->name("report")->middleware("can:report_show");
            Route::get('/report/{id}', [reportController::class, 'create'])->name("report.show")->middleware("can:report_create");
            Route::post('/submit', [reportController::class, 'submit'])->name("report.submit")->middleware("can:report_create");
            Route::get('/myreport', [reportController::class, 'myreport'])->name("report.myreport")->middleware("can:report_show_myreport");
            Route::get('/myreport/show/{id}', [reportController::class, 'myreportShow'])->name("report.myreport.show")->middleware("can:report_show_myreport");
            Route::get('/details/{id}', [reportController::class, 'details'])->name("report.details")->middleware("can:report_show");
        });
        /************* end  exam & report ***************/
        /********************* start final Exam *********************************/
        Route::prefix('finalexam')->group(function () {
            Route::get('/', [finalexamContoller::class, 'index'])->name("finalexam")->middleware("can:finelExam_show");
            Route::post('save', [finalexamContoller::class, 'save'])->name("finalexam.save")->middleware("can:finelExam_create");
            Route::get('add/{id}', [finalexamContoller::class, 'add'])->name("finalexam.add")->middleware("can:finelExam_add_questions");
            Route::get('show/{id}', [finalexamContoller::class, 'show'])->name("finalexam.show")->middleware("can:finelExam_add_questions");
            Route::post('submit', [finalexamContoller::class, 'submit'])->name("finalexam.submit")->middleware("can:finelExam_add_questions");
            Route::get('filter', [finalexamContoller::class, 'filter'])->name("finalexam.filter")->middleware("can:finelExam_add_questions");
        });

        Route::prefix('testexam')->group(function () {
            Route::get('/', [testexamContoller::class, 'index'])->name("testexam");
            Route::get('test/{id}', [testexamContoller::class, 'test'])->name("testexam.test");
            Route::post('submit', [testexamContoller::class, 'submit'])->name("testexam.submit");
            // Route::get('add/{id}', [finalexamContoller::class, 'add'])->name("finalexam.add");
        });

        /********************* end final Exam *********************************/
        /************* start  role ***************/
        Route::group(['prefix' => 'role'], function () {
            Route::get('/', [roleController::class, 'index'])->name("role")->middleware('can:roles_list');
            Route::get('/create', [roleController::class, 'create'])->name("role.create")->middleware('can:roles_add_role');
            Route::post('/submit', [roleController::class, 'submit'])->name("role.submit")->middleware('can:roles_add_role');
            Route::get('/edit/{id}', [roleController::class, 'edit'])->name("role.edit")->middleware('can:roles_modify_role');
            Route::post('/update/{id}', [roleController::class, 'update'])->name("role.update")->middleware('can:roles_modify_role');
        });
        /************* end  role ***************/
        /************* start  dbExport_dbExport ***************/
        Route::group(['prefix' => 'database', 'middleware' => 'can:dbExport_dbExport'], function () {
            Route::get('/', [AdminDatabaseController::class, 'index'])->name("database");
            Route::get('/our_backup_database', [AdminDatabaseController::class, 'our_backup_database'])->name('our_backup_database');
        });
        /************* end  dbExport_dbExport ***************/


        /************* start languages ***************/
        Route::group(['prefix' => 'languages'], function () {
            Route::get("/", [languagesController::class, "index"])->name("languages")->middleware("can:Languages_list");
            Route::get("/create", [languagesController::class, "create"])->name("languages.create")->middleware("can:Languages_addLanguage");
            Route::post("/submit", [languagesController::class, "submit"])->name("languages.submit")->middleware("can:Languages_addLanguage");
            Route::get("/edit/{id}", [languagesController::class, "edit"])->name("languages.edit")->middleware("can:Languages_editLanguage");
            Route::post("/update/{id}", [languagesController::class, "update"])->name("languages.update")->middleware("can:Languages_editLanguage");
            Route::get("submitLang/{id}", [languagesController::class, "submitLang"])->name("languages.submitLang");
        });

        /************* end languages ***************/

        /************* start board ***************/
        Route::group(['prefix' => 'board'], function () {
            Route::get("/", [boardController::class, "index"])->name("board")->middleware("can:newsboard_list");
            Route::get("/view/{id}", [boardController::class, "view"])->name("board.view")->middleware("can:newsboard_View");
            Route::get("/create", [boardController::class, "create"])->name("board.create")->middleware("can:newsboard_addNews");
            Route::post("/submit", [boardController::class, "submit"])->name("board.submit")->middleware("can:newsboard_addNews");
            Route::get("/edit/{id}", [boardController::class, "edit"])->name("board.edit")->middleware("can:newsboard_editNews");
            Route::post("/update/{id}", [boardController::class, "update"])->name("board.update")->middleware("can:newsboard_editNews");
            Route::get("/delete/{id}", [boardController::class, "delete"])->name("board.delete")->middleware("can:newsboard_delNews");
        });

        /************* end board ***************/

        /************* start hostel ***************/
        Route::group(['prefix' => 'hostel'], function () {
            Route::get("/", [hostelController::class, "index"])->name("hostel")->middleware("can:Hostel_list");
            Route::get("/create", [hostelController::class, "create"])->name("hostel.create")->middleware("can:Hostel_AddHostel");
            Route::post("/submit", [hostelController::class, "submit"])->name("hostel.submit")->middleware("can:Hostel_AddHostel");
            Route::get("/edit/{id}", [hostelController::class, "edit"])->name("hostel.edit")->middleware("can:Hostel_list");
            Route::post("/update/{id}", [hostelController::class, "update"])->name("hostel.update")->middleware("can:Hostel_list");
            Route::get("/delete/{id}", [hostelController::class, "delete"])->name("hostel.delete")->middleware("can:Hostel_list");
        });
        /************* end hostel ***************/
        /************* start catehostel ***************/
        Route::group(['prefix' => 'catehostel'], function () {
            Route::get("/", [catehostelController::class, "index"])->name("catehostel")->middleware("can:Hostel_HostelCat");
            Route::get("/create", [catehostelController::class, "create"])->name("catehostel.create")->middleware("can:Hostel_HostelCat");
            Route::post("/submit", [catehostelController::class, "submit"])->name("catehostel.submit")->middleware("can:Hostel_HostelCat");
            Route::get("/edit/{id}", [catehostelController::class, "edit"])->name("catehostel.edit")->middleware("can:Hostel_HostelCat");
            Route::post("/update/{id}", [catehostelController::class, "update"])->name("catehostel.update")->middleware("can:Hostel_HostelCat");
            Route::get("/delete/{id}", [catehostelController::class, "delete"])->name("catehostel.delete")->middleware("can:Hostel_HostelCat");
        });
        /************* end catehostel ***************/
        /************* start static_pages ***************/

        Route::group(['prefix' => 'static_pages'], function () {
            Route::get("/", [static_pagesContoller::class, "index"])->name("static_pages");
            Route::post("/save", [static_pagesContoller::class, "save"])->name("static_pages.save");
            Route::get("/read_page/{id}", [static_pagesContoller::class, "read_page"])->name("static_pages.read_page");
        });

        /*************************** end static_pages/******************* */
        Route::group(['prefix' => 'reports'], function () {
            Route::get("/", [reportsController::class, "index"])->name("reports");
            Route::get("/reprots_users", [reportsController::class, "reportUser"])->name("reports.user");
        });

















        Route::get('record', [recordController::class, 'index'])->name("record");
        Route::get('record/send', [recordController::class, 'send']);
    });
});


// Route::prefix('teacher')->middleware(['auth', 'isTeacher'])->group(function () {
//     Route::get('/', [TeacherController::class, 'index']);
// });
