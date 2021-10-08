<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="SolutionsBricks.com">
   
    <title>@yield("title")</title>
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" id="theme" rel="stylesheet">
    <link href="{{asset('css/intlTelInput.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/global-calendars/jquery.calendars.picker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/summernote.css')}}" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar card-no-border ng-scope mini-sidebar"  cz-shortcut-listen="true">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" style="display: none;">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar topbarSticky no-print" >
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#/">
                        <span style="display: none;">
                            <img src="https://kharagny.com/zoser3/assets/images/logo-dark.png" alt="homepage" class="dark-logo">
                            <img src="https://kharagny.com/zoser3/assets/images/logo-light.png" class="light-logo" alt="homepage">
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="https://kharagny.com/zoser3/dashboard/profileImage/1" alt="user" class="profile-pic"></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="https://kharagny.com/zoser3/dashboard/profileImage/1" alt="user"></div>
                                            <div class="u-text">
                                                <h4>mohamed mohamed omar</h4>
                                                <p class="text-muted">admin@example.com</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <a href="portal#/account/invoices" class="dropdown-item"><i class="ti-wallet"></i> My Invoices</a> <a href="portal#/messages" class="dropdown-item"><i class="mdi mdi-message-text-outline"></i> Messages</a>
                                    <div class="dropdown-divider"></div> <a href="portal#/account" class="dropdown-item"><i class="ti-settings"></i> Account Settings</a>
                                    <div class="dropdown-divider"></div> <a href="https://kharagny.com/zoser3/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="width:45px;">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-language"></i></a>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <a class="dropdown-item active" >English</a>
                                <a class="dropdown-item ">Arabic</a>
                                <a class="dropdown-item ">French</a>
                                <a class="dropdown-item ">Dutch</a>
                                <a class="dropdown-item ">German</a>
                                <a class="dropdown-item ">Hindi</a>
                                <a class="dropdown-item ">Italian</a>
                                <a class="dropdown-item ">Turkish</a>
                                <a class="dropdown-item ">Russian</a>
                                <a class="dropdown-item " >Spanish</a>
                                <a class="dropdown-item " >Portuguse</a>
                                <a class="dropdown-item " >Bengali</a>
                                <a class="dropdown-item " >Chineese</a>
                                <a class="dropdown-item " >Indonesian</a>
                                <a class="dropdown-item " >Romanian</a>
                                <a class="dropdown-item " >Thai</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown" style="width:45px;">
                            <a href="https://kharagny.com/zoser3/logout" class="nav-link text-muted waves-effect waves-dark"> <i class="fa fa-power-off"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="right-side-toggle text-muted nav-link " href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-view-grid"></i></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar enableSlimScroller no-print" style="padding-bottom: 60px; overflow: visible;">
            <!-- Sidebar scroll-->
            <div class="slimScrollDiv" style="position: relative; overflow: visible; width: auto; height: 100%;">
                <div class="scroll-sidebar" style="overflow: visible hidden; width: auto; height: 100%;">
                    <!-- User profile -->
                    <div class="user-profile">
                        <!-- User profile image -->
                        <div class="profile-img"> <img src="#" alt="user" width="50" height="50"> </div>
                        <!-- User profile text-->
                        <div class="profile-text"> <a href="javascript:void(0)" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">mohamed mohamed omar <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Invoices</a> <a href="#" class="dropdown-item"><i class="mdi mdi-message-text-outline"></i> Messages</a>
                                <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Settings</a>
                                <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User profile text-->
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li><a class="aj scrollTop" href="" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">Welcome Office</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="{{url('/visitors')}}">Visitors</a></li>
                                    <li><a class="aj scrollTop" href="{{url('/phone_calls')}}">Phone Calls</a></li>
                                    <li><a class="aj scrollTop" href="#">Postal</a></li>
                                    <li><a class="aj scrollTop" href="#">Contact Messages</a></li>
                                    <li><a class="aj scrollTop" href="#">Enquiries</a></li>
                                    <li><a class="aj scrollTop" href="#">Complaints</a></li>
                                    <li><a class="aj scrollTop" href="#">Office Categories</a></li>
                                </ul>
                            </li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-video"></i><span class="hide-menu">Online Meetings</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-message-text-outline"></i><span class="hide-menu">Messages</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-cellphone-iphone"></i><span class="hide-menu">Mail / SMS</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-telegram"></i><span class="hide-menu">Mobile Notifications</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-calendar-text"></i><span class="hide-menu">Calendar</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-timelapse"></i><span class="hide-menu">Classes Schedule</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-timelapse"></i><span class="hide-menu">Virtual Classes Schedule</span></a></li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-check-all"></i><span class="hide-menu">Attendance</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Take Attendance</a></li>
                                    <li><a class="aj scrollTop" href="#">Attendance Report</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-check"></i><span class="hide-menu">Staff Attendance</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Take Attendance</a></li>
                                    <li><a class="aj scrollTop" href="#">Attendance Report</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-airplane"></i><span class="hide-menu">Vacation</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Request vacation</a></li>
                                    <li><a class="aj scrollTop" href="#">Approve vacation</a></li>
                                    <li><a class="aj scrollTop" href="#">My vacations</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-library"></i><span class="hide-menu">Library</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Issue Book</a></li>
                                    <li><a class="aj scrollTop" href="#">Return Book</a></li>
                                    <li><a class="aj scrollTop" href="#">List Books</a></li>
                                    <li><a class="aj scrollTop" href="#">Manage Subscription</a></li>
                                </ul>
                            </li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-folder-multiple-image"></i><span class="hide-menu">Media Center</span></a></li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-briefcase"></i><span class="hide-menu">Employees</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Employees</a></li>
                                    <li><a class="aj scrollTop" href="#">Teachers</a></li>
                                    <li><a class="aj scrollTop" href="#">Departments</a></li>
                                    <li><a class="aj scrollTop" href="#">Designations</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Students</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Students</a></li>
                                    <li><a class="aj scrollTop" href="#">Students Admission</a></li>
                                    <li><a class="aj scrollTop" href="#">Student Categories</a></li>
                                </ul>
                            </li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Parents</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Grade levels</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-cloud-download"></i><span class="hide-menu">Study Material</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Homework</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-file-pdf"></i><span class="hide-menu">Assignments</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-playlist-check"></i><span class="hide-menu">Exams List</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu">Online Exams</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-bullhorn"></i><span class="hide-menu">News Board</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Events</span></a></li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-sitemap"></i><span class="hide-menu">Classes</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Classes</a></li>
                                    <li><a class="aj scrollTop" href="#">sections</a></li>
                                </ul>
                            </li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Subjects</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">Certificates</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-certificate"></i><span class="hide-menu">ID Cards</span></a></li>
                            <li><a class="aj scrollTop" href="#" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span class="hide-menu">Reports</span></a></li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu">frontend CMS</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Control Pages</a></li>
                                    <li><a class="aj scrollTop" href="#">frontend CMS Settings</a></li>
                                </ul>
                            </li>
                            <li><a class="has-arrow" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Administrative tasks</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a class="aj scrollTop" href="#">Academic Years</a></li>
                                    <li><a class="aj scrollTop" href="#">Promotion</a></li>
                                    <li><a class="aj scrollTop" href="#">Mail / SMS Templates</a></li>
                                    <li><a class="aj scrollTop" href="#">Polls</a></li>
                                    <li><a class="aj scrollTop" href="#">Dormitories</a></li>
                                    <li><a class="aj scrollTop" href="#">General Settings</a></li>
                                    <li><a class="aj scrollTop" href="#">Languages</a></li>
                                    <li><a class="aj scrollTop" href="#">Administrators</a></li>
                                    <li><a class="aj scrollTop" href="#">Permission Roles</a></li>
                                    <li><a class="aj scrollTop" href="#">School Terms</a></li>
                                    <li><a class="aj scrollTop" href="#">DB Export</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px; height: 88.2236px;"></div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;"></div>
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Account Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Messages"><i class="mdi mdi-gmail"></i></a> <!-- item-->
                <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height: 484px;">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ngView:  -->
                @yield("contect") 

                <div class="right-sidebar shw-rside" style="display: block; overflow: visible;">
                    <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 100%;">
                        <div class="slimscrollright" style="overflow: hidden; width: auto; height: 100%;">
                            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                            <div class="r-panel-body">
                                <ul id="themecolors" class="m-t-20">
                                    <li><b>With Light sidebar</b></li>
                                    <li><a  href="javascript:void(0)" data-theme="default" class="default-theme" >1</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="green" class="green-theme" >2</a></li>
                                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme" >3</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="blue" class="blue-theme working" >4</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="purple" class="purple-theme" >5</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="megna" class="megna-theme" >6</a></li>
                                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                    <li><a  href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme" >7</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme" >8</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme" >9</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme" >10</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme" >11</a></li>
                                    <li><a  href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme" >12</a></li>
                                </ul>
                                <br>
                                <span class="d-block">Change Academic Year</span>
                                <form class="form ng-pristine ng-valid">
                                    <div class="form-group m-t-10 row">
                                        <div class="col-12">
                                            <select class="form-control ng-pristine ng-valid" id="selectedAcYear">
                                                <!-- ngRepeat: year in $root.dashboardData.academicYear -->
                                                <!-- ngIf: year.isDefault == '0' -->
                                                <!-- end ngRepeat: year in $root.dashboardData.academicYear -->
                                                <!-- ngRepeat: year in $root.dashboardData.academicYear -->
                                                <!-- ngIf: year.isDefault == '1' -->
                                                <option  value="1"  class="ng-binding ng-scope" selected="selected">2021 - Default academic year</option><!-- end ngIf: year.isDefault == '1' -->
                                                <!-- end ngRepeat: year in $root.dashboardData.academicYear -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-b-0">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success btn-flat pull-right ng-binding" >Change Year</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="slimScrollBar" style="background: rgb(220, 220, 220); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 460.169px;"></div>
                        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <div class="preloader" id="overlay" style="opacity: 0.9; display: none;">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
                </svg>
            </div>
            <footer class="footer">
                All Rights Reserved. - <a target="_BLANK" href="https://kharagny.com/zoser3/terms">School Terms</a>
            </footer>
        </div>

        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <div class="modal fade ng-scope" visible="$root.media_manager" data-backdrop="static">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ng-binding"></h4><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" >

                    <form class="ng-scope ng-pristine ng-valid">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tabsItem" role="tablist">
                                <li class="nav-item" role="presentation"><a  class="nav-link active ng-hide" href="#mm_upload_tab" aria-controls="mm_upload_tab" role="tab" data-toggle="tab">Upload</a></li>
                                <li class="nav-item" role="presentation"><a  class="nav-link active ng-hide"  href="#mm_library" aria-controls="mm_library" role="tab" data-toggle="tab">Files Library</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">

                                <div role="tabpanel" class="tab-pane active p-20 ng-hide" id="mm_upload_tab" ng-show="$root.show_uploader == true">


                                    <div  class="drop-box ng-pristine ng-valid">Click to select files or drop here</div>

                                    <ul  class="ml_uploaded_images ng-hide">
                                        <!-- ngRepeat: file in $root.mm_files -->
                                    </ul>
                                    <ul  class="ml_uploaded_images">
                                        <li style="font:smaller">
                                            <img ngf-thumbnail="$root.mm_files"  class="ng-hide">
                                            <div class="image_progress ng-hide" >
                                                <div class="image_progress_inner ng-binding"  >%</div>
                                            </div>
                                        </li>
                                    </ul>



                                </div>
                                <div role="tabpanel" class="tab-pane p-20 active ng-hide" id="mm_library"   onshow="alert('ee')">

                                    <ul class="ml_uploaded_images">
                                        <!-- ngRepeat: file in gallery_images -->
                                    </ul>
                                    <div  class="mm_load_more">
                                        <img class="mm_load_more_loading" src="assets/images/loading.gif">
                                        Load More
                                    </div>

                                </div>

                            </div>

                        </div>
                    </form>
                    <div class="row ng-scope">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger waves-effect waves-light pull-right">Cancel</button>
                            <button type="button" style="margin: 5px;" class="btn btn-info waves-effect waves-light pull-right">Select / Upload</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @yield("contect")
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <input type="hidden" id="rooturl" value="https://kharagny.com/zoser3/">
    <input type="hidden" id="utilsScript" value="https://kharagny.com/zoser3/assets/js/utils.js">
    <script src="{{asset('plugins/jquery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::asset('plugins/bootstrap/js/tether.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/popper.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('plugins/echarts/echarts-all.js')}}"></script>

    <script src="{{asset('js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{asset('js/OraSchool.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/intlTelInput.min.js')}}"></script>
    <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('js/summernote.js')}}"></script>
    <script src="{{asset('plugins/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/jquery.colorbox-min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('plugins/humanize-duration/humanize-duration.js')}}"></script>

    <script type="text/javascript" src="{{asset('plugins/global-calendars/jquery.plugin.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/global-calendars/jquery.calendars.all.js')}}"></script>




    <div id="cboxOverlay" style="display: none;"></div>
    <div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
        <div id="cboxWrapper">
            <div>
                <div id="cboxTopLeft" style="float: left;"></div>
                <div id="cboxTopCenter" style="float: left;"></div>
                <div id="cboxTopRight" style="float: left;"></div>
            </div>
            <div style="clear: left;">
                <div id="cboxMiddleLeft" style="float: left;"></div>
                <div id="cboxContent" style="float: left;">
                    <div id="cboxTitle" style="float: left;"></div>
                    <div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button>
                    <div id="cboxLoadingOverlay" style="float: left;"></div>
                    <div id="cboxLoadingGraphic" style="float: left;"></div>
                </div>
                <div id="cboxMiddleRight" style="float: left;"></div>
            </div>
            <div style="clear: left;">
                <div id="cboxBottomLeft" style="float: left;"></div>
                <div id="cboxBottomCenter" style="float: left;"></div>
                <div id="cboxBottomRight" style="float: left;"></div>
            </div>
        </div>
        <div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div>
    </div><label tabindex="-1" style="visibility: hidden; position: absolute; overflow: hidden; width: 0px; height: 0px; border: none; margin: 0px; padding: 0px;">upload<input type="file" ></label>
</body>

</html>