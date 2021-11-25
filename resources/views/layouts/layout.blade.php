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
    <link href="{{asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('assets/css/app-dark.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/mystyle.css')}}"  rel="stylesheet" >



    
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
                                                <li class="menu-title">Main</li>

                                                <li class="mm-active">
                                                    <a href="javascript: void(0);" class="waves-effect mm-active">
                                                        <i class="mdi mdi-speedometer"></i>
                                                        <span class="badge rounded-pill bg-danger float-end">9+</span>
                                                        <span>Dashboards</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse mm-show" aria-expanded="false">
                                                        <li class="mm-active"><a href="{{url('/admin')}}" class="active">Dashboard 1</a></li>
                                                        <!-- <li><a href="index-2.html">Dashboard 2</a></li> -->
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-email-variant"></i>
                                                        <span>Welcome Office</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="email-inbox.html">Visitors</a></li>
                                                        <li><a href="email-read.html">Phone Calls</a></li>
                                                        <li><a href="email-compose.html">Postal</a></li>
                                                        <li><a href="email-read.html">Contact Messages</a></li>
                                                        <li><a href="email-compose.html">Enquiries</a></li>
                                                        <li><a href="email-read.html">Complaints</a></li>
                                                        <li><a href="email-compose.html">Office Categories</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Calender -->
                                                <li>
                                                    <a href="{{url('admin/meeting')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Online Meetings</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/chat')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Messages</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Mail / SMS</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Mobile Notifications</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Calendar</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/class_schedulr')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Classes Schedule</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Virtual Classes Schedule</span>
                                                    </a>
                                                </li>
                                                <!-- <li class="menu-title">Components</li> -->

                                                <!-- UI Elements -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-briefcase-check"></i>
                                                        <span>Attendance</span>
                                                    </a>

                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="{{url('admin/attendance')}}">Take Attendance</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/attendance_report">Attendance Report</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Advanced UI -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-buffer"></i>
                                                        <span>Staff Attendance</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="{{url('admin/attendance/staff')}}">Take Attendance</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/staffAttendance_report">Attendance Report</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Forms -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-clipboard-outline"></i>
                                                        <span>Vacation</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/vacation">Request vacation</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/vacation/approve">Approve vacation</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/vacation/mine">My vacations</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Charts -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-chart-arc"></i>
                                                        <span>Library</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/library_issues">Issue Book</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/library_return">Return Book</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/library">List Books</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/lib_subscription">Manage Subscription</a></li>
                                                    </ul>

                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Media Center</span>
                                                    </a>
                                                </li>
                                                <!-- Table -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-format-list-bulleted-type"></i>
                                                        <span>Employees</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="{{url('admin/employee')}}">Employees</a></li>
                                                        <li><a href="{{url('admin/teacher')}}">Teachers</a></li>
                                                        <li><a href="{{url('admin/department')}}">Departments</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/designations">Designations</a></li>
                                                    </ul>
                                                </li>

                                                <!-- Icons -->
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>Students</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="{{url('admin/student')}}">Students</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/students/admission">Students Admission</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/student/categories">Student Categories</a></li>
                                                    </ul>

                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Parents</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/Gradelevels')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Grade levels</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/materials')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Study Material</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Homework</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Assignments</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Exams List</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Online Exams</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>News Board</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Events</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>Classes</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/classes">Classes</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/sections">sections</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/subjects')}}" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Subjects</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Certificates</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>ID Cards</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="calendar.html" class=" waves-effect">
                                                        <i class="mdi mdi-calendar"></i>
                                                        <span>Reports</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>frontend CMS</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/frontend/pages">Control Pages</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/frontend/settings">frontend CMS Settings</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="mdi mdi-album"></i>
                                                        <span>Classes</span>
                                                    </a>
                                                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                                                        <li><a href="https://kharagny.com/zoser3/portal#/academicYear">Academic Years</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/promotion">Promotion</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/mailsmsTemplates">Mail / SMS Templates</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/polls">Polls</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/dormitories">Dormitories</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/settings">General Settings</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/languages">Languages</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/admins">Administrators</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/roles">Permission Roles</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/terms">School Terms</a></li>
                                                        <li><a href="https://kharagny.com/zoser3/portal#/dbexports">DB Export</a></li>
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
                console.log('yyyyyy')
            });
        </script>


        <i title="Raphaël Colour Picker" style="display: none; color: transparent;"></i>
        @yield('script')
    </body>
</body>

</html>