<?php

$roles_perms = array(
    "academicyears" => array("list", "addAcademicyear", "editAcademicYears", "delAcademicYears"),
    "level&exam" => array("show"),
    "level" => array("show","show_question","create","edit"),
    "question" => array("show","create"),
    "test" => array("show","create","add_questions",),
    "finelExam" => array("show","create","add_questions","pass"),
    "examLevel" => array("show"),


    "report" => array("show","create","show_myreport",),
    


    "Exam&report" => array("show"),


    "staticPages" => array("list", "addPage", "editPage", "delPage"),
    "Administrators" => array("list", "addAdministrator", "editAdministrator", "delAdministrator"),
    "employees" => array("list", "addEmployee", "editEmployee", "delEmployee"),
    "Meetings" => array("list", "addMeeting", "editMeeting", "delMeet"),

    "AccountSettings" => array("myInvoices", "ChgProfileData", "chgEmailAddress", "chgPassword"),
    "Messages" => array("list"),
    "dbExport" => array("dbExport"),

    "classes" => array("list", "addClass", "editClass", "delClass"),
    "sections" => array("list", "addSection", "editSection", "delSection"),
    "Subjects" => array("list", "addSubject", "editSubject", "delSubject"),
    "adminTasks" => array("globalSettings", "activatedModules", "paymentsSettings", "mailSmsSettings", "vacationSettings", "mobileSettings", "frontendCMS", "bioItegration", "lookFeel"),
    "Dormitories" => array("list", "addDormitories", "editDorm", "delDorm"),
    "Expenses" => array("list", "addExpense", "editExpense", "delExpense", "expCategory"),
    "Incomes" => array("list", "addIncome", "editIncome", "delIncome", "incomeCategory"),
    "Languages" => array("list", "addLanguage", "editLanguage", "delLanguage"),
    "Polls" => array("list", "addPoll", "editPoll", "delPoll"),

    "newsboard" => array("list", "View", "addNews", "editNews", "delNews"),
    "events" => array("list", "View", "addEvent", "editEvent", "delEvent"),

    "frontendCMSpages" => array("list", "addPage", "editPage", "delPage"),
    "mediaCenter" => array("View", "addAlbum", "editAlbum", "delAlbum", "addMedia", "editMedia", "delMedia"),
    "roles" => array("list", "add_role", "modify_role", "delete_role","show_created","show_edit"),
    "gradeLevels" => array("list", "addLevel", "editGrade", "delGradeLevel"),
    "Promotion" => array("promoteStudents"),
    "mobileNotifications" => array("sendNewNotification"),
    "mailsms" => array("mailSMSSend", "mailsmsTemplates"),
    "FeeGroups" => array("list", "addFeeGroup", "editFeeGroup", "delFeeGroup"),
    "FeeTypes" => array("list", "addFeeType", "editFeeType", "delFeeType"),
    "FeeAllocation" => array("list", "addFeeAllocation", "editFeeAllocation", "delFeeAllocation"),
    "FeeDiscount" => array("list", "addFeeDiscount", "editFeeDiscount", "delFeeDiscount", "assignUser"),
    "Invoices" => array("list", "View", "addPayment", "editPayment", "delPayment", "collInvoice", "payRevert", "dueInvoices", "Export"),
    "Assignments" => array("list", "AddAssignments", "editAssignment", "delAssignment", "viewAnswers", "applyAssAnswer", "Download"),
    "studyMaterial" => array("list", "addMaterial", "editMaterial", "delMaterial", "Download"),
    "Homework" => array("list", "View", "addHomework", "editHomework", "delHomework", "Download", "Answers"),
    "Payroll" => array("makeUsrPayment", "delUsrPayment", "userSalary", "salaryBase", "hourSalary", "MyPayroll"),
    "classSch" => array("list", "setting","addSch", "editSch", "delSch"),
    "vclassSch" => array("list", "addSch", "editSch", "delSch", "conSch"),
    "parents" => array("list", "AddParent", "editParent", "delParent", "Approve", "Import", "Export"),
    "teachers" => array("list", "addTeacher", "EditTeacher", "delTeacher", "Approve", "teacLeaderBoard", "Import", "Export"),
    "students" => array("list", "admission", "editStudent", "delStudent", "listGradStd", "Approve", "stdLeaderBoard", "Import", "Export", "Attendance", "Marksheet", "medHistory", "std_cat"),
    "Marksheet" => array("Marksheet"),
    "examsList" => array("list", "View", "addExam", "editExam", "delExam", "examDetailsNot", "showMarks", "controlMarksExam"),
    "onlineExams" => array("list", "addExam", "editExam", "delExam", "takeExam", "showMarks", "QuestionsArch"),
    "dashboard" => array("stats", "Profile", "studentLeaderboard", "teacherLeaderboard", "celebBirthday", "quicklinks", "Calendar"),
    "wel_office_cat" => array("list", "add_cat", "edit_cat", "del_cat"),
    "visitors" => array("list", "View", "add_vis", "edit_vis", "del_vis", "Download", "Export"),
    "phn_calls" => array("list", "View", "add_call", "edit_call", "del_call", "Export"),
    "postal" => array("list", "add_postal", "edit_postal", "del_postal", "Download", "Export"),
    "con_mess" => array("list", "View", "del_mess", "Export"),
    "enquiries" => array("list", "View", "add_enq", "edit_enq", "del_enq", "Download", "Export"),
    "complaints" => array("list", "View", "add_complaint", "edit_complaint", "del_complaint", "Download", "Export"),
    "trans_vehicles" => array("list", "add_vehicle", "edit_vehicle", "del_vehicle"),
    "Transportation" => array("list", "addTransport", "editTransport", "delTrans", "members"),
    "Hostel" => array("list", "AddHostel", "EditHostel", "delHostel", "listSubs", "HostelCat"),
    "depart" => array("list", "add_depart", "edit_depart", "del_depart"),
    "desig" => array("list", "add_desig", "edit_desig", "del_desig"),
    "Attendance" => array("showAttendance","takeAttendance", "attReport"),
    "myAttendance" => array("myAttendance"),
    "staffAttendance" => array("showAttendance","takeAttendance", "attReport"),
    "Vacation" => array("showVacation","reqVacation", "appVacation", "myVacation"),
    "iss_ret" => array("list", "issue_item", "edit_item", "del_item", "Download", "Export"),
    "items_stock" => array("list", "add_item", "edit_item", "del_item", "Download", "Export"),
    "inv_cat" => array("list", "add_cat", "edit_cat", "del_cat"),
    "suppliers" => array("list", "add_supp", "edit_supp", "del_supp", "Export"),
    "stores" => array("list", "add_store", "edit_store", "del_store"),
    "items_code" => array("list", "add_item", "edit_item", "del_item", "Export"),
    "Library" => array("list", "addBook", "editBook", "delLibrary", "Download", "mngSub"),
    "issue_book" => array("list", "add_issue", "edit_issue", "del_issue", "Export", "book_return"),
    "Certificates" => array("list", "add_cert", "edit_cert", "del_cert"),
    "id_cards" => array("list", "add_card", "edit_card", "del_card"),
    "Reports" => array("Reports"),
);
$roleValue;
foreach ($roles_perms as $key => $values) {
    for ($i = 0; $i < count($values); $i++) {
        $roleValue[$key . '_' . $values[$i]] = $key . '_' . $values[$i];
    }
};
// return 
return [
    'permissions' =>$roleValue,
    'roles_perms' =>$roles_perms,
];
