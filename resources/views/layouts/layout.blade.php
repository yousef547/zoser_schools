<?php

use Illuminate\Support\Facades\Auth;
use App\Models\language;


$langUser = Auth::user()->defLang;
$lang = language::find($langUser)->isRTL;

// echo $lang;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <link href="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap-dark-min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('assets/css/app-dark.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/css/mystyle.css')}}" rel="stylesheet">




    @yield('styles')

</head>

<body>

    <body data-topbar="dark" cz-shortcut-listen="true" class="">

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <x-navbar></x-navbar>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar="init" class="h-100">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px;">

                                        <!--- Sidemenu -->
                                        <div id="sidebar-menu" class="mm-active">
                                            <!-- Left Menu Start -->
                                            <ul class="metismenu list-unstyled mm-show" id="side-menu">

                                                <li class="mm-active">
                                                    <a href="javascript: void(0);" class="waves-effect mm-active">
                                                        <i class="mdi mdi-speedometer"></i>
                                                        <span class="badge rounded-pill bg-danger float-end">9+</span>
                                                        <span>{{$newLang->dashboard}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="false">
                                                        <li class="mm-active"><a href="{{url('/admin')}}" class="active"></a></li>
                                                        <!-- <li><a href="index-2.html">Dashboard 2</a></li> -->
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-email-variant"></i>
                                                        <span>{{$newLang->wel_office}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="email-inbox.html">{{$newLang->visitors}}</a></li>
                                                        <li><a href="email-read.html">{{$newLang->phn_calls}}</a></li>
                                                        <li><a href="email-compose.html">{{$newLang->postal}}</a></li>
                                                        <li><a href="email-read.html">{{$newLang->con_mess}}</a></li>
                                                        <li><a href="email-compose.html">{{$newLang->enquiries}}</a></li>
                                                        <li><a href="email-read.html">{{$newLang->complaints}}</a></li>
                                                        <li><a href="email-compose.html">{{$newLang->wel_office_cat}}</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Calender "  -->
                                                @can("Meetings_list")
                                                <li>
                                                    <a href="{{url('admin/meeting')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->onlineMeetings}}</span>
                                                    </a>
                                                </li>
                                                @endcan
                                                @can("level&exam_show")
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-email-variant"></i>
                                                        <span>{{$newLang->levels_questions}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("level_show")
                                                        <li><a href="{{route('level')}}">{{$newLang->level}}</a></li>
                                                        @endcan
                                                        @can("question_show")
                                                        <li><a href="{{route('questions')}}">{{$newLang->questions}}</a></li>
                                                        @endcan
                                                        @can("test_show")
                                                        <li><a href="{{route('level_test')}}">{{$newLang->Level_Test}}</a></li>
                                                        @endcan
                                                        @can("report_show")
                                                        <li><a href="{{route('report')}}">{{$newLang->report}}</a></li>
                                                        @endcan
                                                        @can("finelExam_show")

                                                        <li><a href="{{route('finalexam')}}">{{$newLang->final_exam}}</a></li>
                                                        @endcan

                                                    </ul>
                                                </li>
                                                @endcan
                                                @can("Exam&report_show")
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-email-variant"></i>
                                                        <span>{{$newLang->quiz_Reports}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("examLevel_show")
                                                        <li><a href="{{route('exam')}}">{{$newLang->exam}}</a></li>
                                                        @endcan
                                                        @can("report_show_myreport")
                                                        <li><a href="{{route('report.myreport')}}">{{$newLang->my_report}}</a></li>
                                                        @endcan
                                                        @can("finelExam_pass")
                                                        <li><a href="{{route('testexam')}}">{{$newLang->final_exam}}</a></li>
                                                        @endcan
                                                    </ul>


                                                </li>
                                                @endcan
                                                <li>
                                                    <a href="{{url('admin/chat')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->Messages}}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->mailsms}}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->mobileNotifications}}</span>
                                                    </a>
                                                </li>
                                                <!-- <li>
                                                    <a href="" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>record</span>
                                                    </a>
                                                </li> -->
                                                @can("classSch_list")
                                                <li>
                                                    <a href="{{url('admin/class_schedulr')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->classSch}}</span>
                                                    </a>
                                                </li>
                                                @endcan
                                                <li>
                                                    <a href="{{url('admin/virtual_Class')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->vclassSch}}</span>
                                                    </a>
                                                </li>

                                                <!-- <li class="menu-title">Components</li> -->

                                                <!-- UI Elements -->
                                                @can("Attendance_showAttendance")
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-briefcase-check"></i>
                                                        <span>{{$newLang->Attendance}}</span>
                                                    </a>

                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("Attendance_takeAttendance")

                                                        <li><a href="{{url('admin/attendance')}}">{{$newLang->takeAttendance}}</a></li>
                                                        @endcan
                                                        @can("Attendance_attReport")

                                                        <li><a href="{{url('admin/attendance/report')}}">{{$newLang->attReport}}</a></li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                                @endcan
                                                <!-- Advanced UI -->
                                                @can("staffAttendance_showAttendance")

                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-buffer"></i>
                                                        <span>{{$newLang->staffAttendance}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("staffAttendance_takeAttendance")
                                                        <li><a href="{{url('admin/attendance/staff')}}">{{$newLang->takeAttendance}}</a></li>
                                                        @endcan
                                                        @can("staffAttendance_attReport")
                                                        <li><a href="https://kharagny.com/zoser3/portal#/staffAttendance_report">{{$newLang->attReport}}</a></li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                                @endcan
                                                <!-- Forms -->
                                                @can("Vacation_showVacation")
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-clipboard-outline"></i>
                                                        <span>{{$newLang->Vacation}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("Vacation_reqVacation")
                                                        <li><a href="{{url('admin/vacation/request')}}">{{$newLang->reqVacation}}</a></li>
                                                        @endcan
                                                        @can("Vacation_appVacation")
                                                        <li><a href="{{url('admin/vacation/approve')}}">{{$newLang->appVacation}}</a></li>
                                                        @endcan
                                                        @can("Vacation_myVacation")
                                                        <li><a href="{{url('admin/vacation/my_vacations')}}">{{$newLang->myVacation}}</a></li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                                @endcan
                                                <!-- Charts -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-chart-arc"></i>
                                                        <span>{{$newLang->Library}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/library_issues">{{$newLang->issue_book}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/library_return">{{$newLang->book_return}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/library">{{$newLang->listBooks}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/lib_subscription">{{$newLang->mngSub}}</a></li>
                                                    </ul>

                                                </li>
                                                <li>
                                                    <a href="{{url('admin/media')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->mediaCenter}}</span>
                                                    </a>
                                                </li>
                                                <!-- Table -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-format-list-bulleted-type"></i>
                                                        <span>{{$newLang->employees}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("employees_list")
                                                        <li><a href="{{url('admin/employee')}}">{{$newLang->employees}}</a></li>
                                                        @endcan
                                                        <li><a href="{{url('admin/teacher')}}">{{$newLang->teachers}}</a></li>
                                                        @can("depart_list")
                                                        <li><a href="{{url('admin/department')}}">{{$newLang->depart}}</a></li>
                                                        @endcan
                                                        <li><a href="https://kharagny.com/zoser3/portal#/designations">{{$newLang->desig}}</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Icons -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>{{$newLang->students}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("students_list")
                                                        <li><a href="{{url('admin/student')}}">{{$newLang->students}}</a></li>
                                                        @endcan
                                                        @can("students_admission")
                                                        <li><a href="{{url('admin/student/create')}}">{{$newLang->admission}}</a></li>
                                                        @endcan
                                                        <li><a href="https://kharagny.com/zoser3/portal#/student/categories">{{$newLang->std_cat}}</a></li>
                                                    </ul>

                                                </li>
                                                <li>
                                                    <a href="{{url('admin/parent')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->parents}}</span>
                                                    </a>
                                                </li>
                                                @can("gradeLevels_list")
                                                <li>
                                                    <a href="{{url('admin/Gradelevels')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->gradeLevels}}</span>
                                                    </a>
                                                </li>
                                                @endcan
                                                @can("studyMaterial_list")
                                                <li>
                                                    <a href="{{url('admin/materials')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->studyMaterial}}</span>
                                                    </a>
                                                </li>
                                                @endcan
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->Homework}}</span>
                                                    </a>
                                                </li>
                                                @can("Assignments_list")
                                                <li>
                                                    <a href="{{url('admin/assignments')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->Assignments}}</span>
                                                    </a>
                                                </li>
                                                @endcan
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->examsList}}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->Onlineexams}}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->newsboard}}</span>
                                                    </a>
                                                </li>
                                                @can("events_list")
                                                <li>
                                                    <a href="{{route('event')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->events}}</span>
                                                    </a>
                                                </li>
                                                @endcan
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>{{$newLang->classes}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        @can("classes_list")
                                                        <li><a href="{{url('admin/classes')}}">{{$newLang->classes}}</a></li>
                                                        @endcan
                                                        @can("sections_list")
                                                        <li><a href="{{url('admin/section')}}">{{$newLang->sections}}</a></li>
                                                        @endcan
                                                    </ul>
                                                </li>
                                                @can('Subjects_list')
                                                <li>
                                                    <a href="{{url('admin/subjects')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->Subjects}}</span>
                                                    </a>
                                                </li>
                                                @endcan
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->Certificates}}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->id_cards}}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>{{$newLang->Reports}}</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>{{$newLang->frontendCMS}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/frontend/pages">{{$newLang->controlPages}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/frontend/settings">{{$newLang->CMSSettings}}</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>{{$newLang->adminTasks}}</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/academicYear">{{$newLang->academicyears}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/promotion">{{$newLang->Promotion}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/mailsmsTemplates">{{$newLang->mailsmsTemplates}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/polls">{{$newLang->Polls}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/dormitories">{{$newLang->Dormitories}}</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/settings">{{$newLang->generalSettings}}</a></li>
                                                        @can("Languages_list")
                                                        <li><a href="{{route('languages')}}">{{$newLang->Languages}}</a></li>
                                                        @endcan
                                                        <li><a href="https://kharagny.com/zoser3/portal#/admins">{{$newLang->Administrators}}</a></li>
                                                        @can('academicyears_addAcademicyear')
                                                        <li><a href="{{route('role')}}">{{$newLang->roles}}</a></li>
                                                        @endcan
                                                        <li><a href="https://kharagny.com/zoser3/portal#/terms">{{$newLang->schoolTerms}}</a></li>
                                                        <li><a href="{{route('database')}}">{{$newLang->dbExport}}</a></li>
                                                    </ul>

                                                </li>
                                                <!-- Layouts -->


                                            </ul>
                                        </div>
                                        <!-- Sidebar -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 965px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar simplebar-visible" style="transform: translate3d(0px, 116px, 0px); display: block; height: 187px;"></div>
                    </div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    @yield('content')
                    <!-- container-fluid -->
                </div>

                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>2021 © Amezia.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar="init" class="h-100">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: -16.8px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <div class="rightbar-title px-3 py-4">
                                        <a href="javascript:void(0);" class="right-bar-toggle float-end">
                                            <i class="mdi mdi-close noti-icon"></i>
                                        </a>
                                        <h5 class="m-0">Settings</h5>
                                    </div>

                                    <!-- Settings -->
                                    <hr>
                                    <h6 class="text-center mb-0">Choose Layouts</h6>

                                    <div class="p-4">
                                        <div class="mb-2">
                                            <img src="{{asset('assets/images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" checked="">
                                            <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                                        </div>

                                        <div class="mb-2">
                                            <img src="{{asset('assets/images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                            <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" data-bsstyle="{{asset('assets/css/bootstrap-dark.min.css')}}" data-appstyle="{{asset('assets/css/app-dark.min.css')}}">
                                            <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                                        </div>

                                        <div class="mb-2">
                                            <img src="{{asset('assets/images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="">
                                        </div>
                                        <div class="form-check form-switch mb-5">
                                            <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch" data-appstyle="{{asset('assets/css/app-rtl.min.css')}}">
                                            <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 855px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: block; height: 286px;"></div>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>


        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <!--Morris Chart-->

        <script src="{{asset('assets/libs/morris.js/morris.min.js')}}"></script>
        <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{asset('assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.js')}}"></script>

        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <script src="{{asset('assets/js/app.js')}}"></script>



        <script>
            $('#logout-link').click(function(e) {
                e.preventDefault();
                $('#logout-form').submit();
                // console.log('yyyyyy')
            });
        </script>


        <i title="Raphaël Colour Picker" style="display: none; color: transparent;"></i>
        @yield('script')
    </body>
</body>

</html>