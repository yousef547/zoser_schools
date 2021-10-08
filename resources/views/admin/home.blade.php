@extends('layouts.layout')
@section('title')
HomePage
@endsection

@section('contect')
<div id="parentDBArea" ng-view="" class="ng-scope"><div class="row page-titles ng-scope">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0 ng-binding">Dashboard</h3>
    </div>
    <div class="col-md-6 col-4 align-self-center">

    </div>
</div>

<div class="row ng-scope" ng-show="$root.can('dashboard.stats')">
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card card-success">
            <div class="card-block">
                <h4 class="card-title text-white ng-binding">Classes</h4>
                <div class="text-right">
                    <h2 class="font-light m-b-0 text-white ng-binding"><i class="mdi mdi-sort-variant"></i>  2</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card card-info">
            <div class="card-block">

                <div id="myCarousel" carousel-init="" class="carousel slide" data-ride="carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item flex-column active">
                            <h4 class="text-white card-title ng-binding">Students</h4>
                            <h3 class="text-white font-light text-right ng-binding"><i class="ti-user"></i> 3</h3>
                        </div>
                        <div class="carousel-item flex-column">
                            <h4 class="text-white card-title ng-binding">Teachers</h4>
                            <h3 class="text-white font-light text-right ng-binding"><i class="ti-user"></i> 9</h3>
                        </div>
                        <div class="carousel-item flex-column">
                            <h4 class="text-white card-title ng-binding">Parents</h4>
                            <h3 class="text-white font-light text-right ng-binding"><i class="ti-user"></i> 0</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6" ng-show="dashboardData.activatedModules.indexOf('messagesAct') > -1 &amp;&amp; adminHasPerm('Messages.list')">
        <div class="card card-danger">
            <div class="card-block">
                <h4 class="card-title text-white ng-binding">Messages</h4>
                <div class="text-right">
                    <h2 class="font-light m-b-0 text-white ng-binding"><i class="mdi mdi-message-text-outline"></i>  0</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 ng-hide" ng-show="dashboardData.invoices">
        <div class="card card-primary">
            <div class="card-block">

                <div id="myCarousel" carousel-init="" class="carousel slide" data-ride="carousel">
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item flex-column active">
                            <h4 class="text-white card-title ng-binding">Invoices</h4>
                            <h3 class="text-white font-light text-right ng-binding">$ </h3>
                        </div>
                        <div class="carousel-item flex-column">
                            <h4 class="text-white card-title ng-binding">Due Invoices</h4>
                            <h3 class="text-white font-light text-right ng-binding">$ </h3><h3>
                        </h3></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row ng-scope">

    <div class="col-lg-4 col-md-6" ng-show="$root.can('dashboard.Profile')">
        <div class="card">
            <div class="card-block">
                <div class="d-flex flex-row">
                    <div class=""><img src="index.php/dashboard/profileImage/1" alt="user" class="img-circle" width="100" height="100" src="index.php/dashboard/profileImage/1"></div>
                    <div class="p-l-20">
                        <h3 class="font-medium ng-binding">mohamed mohamed omar</h3>
                        <h6 class="ng-binding">Username : admin</h6>
                        <h6 class="hidden-sm-down ng-binding">Mail : admin@example.com</h6>
                        <h6 class="ng-binding">Role : ADMIN</h6>
                    </div>
                </div>
            </div>
            <div>
                <hr>
            </div>
            <div class="card-block">
                <button onclick="location.href='portal#/account';" class="btn btn-block btn-primary waves-effect waves-light" type="button"><span class="pull-left ng-binding"><i class="ti-settings"></i> Account Settings</span></button>
                <button ng-show="dashboardData.activatedModules.indexOf('messagesAct') > -1 &amp;&amp; adminHasPerm('Messages.list')" onclick="location.href='portal#/messages';" class="btn btn-block btn-primary waves-effect waves-light" type="button"><span class="pull-left ng-binding"><i class="mdi mdi-message-text-outline"></i> Messages</span></button>
                <button onclick="location.href='logout';" class="btn btn-block btn-primary waves-effect waves-light" type="button"><span class="pull-left ng-binding"><i class="fa fa-power-off"></i> Logout</span></button>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-3" ng-show="$root.can('dashboard.studentLeaderboard')">
        <div class="card card-outline-primary">
            <div class="card-block" style="overflow: visible;">
                <h4 class="card-title ng-binding"><i class="fa fa-trophy"></i> Student's leaderboard</h4>
                <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 255px;"><div class="message-box" scroll-box="" id="stdLdrBrd" height="255px" style="overflow: hidden; width: auto; height: 255px;">
                    <div class="message-widget message-scroll">
                        <!-- Message -->
                        <!-- ngRepeat: student in dashboardData.studentLeaderBoard -->

                    </div>
                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 255px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-3" ng-show="$root.can('dashboard.teacherLeaderboard')">
        <div class="card">
            <div class="card-block" style="overflow: visible;">
                <h4 class="card-title ng-binding"><i class="fa fa-trophy"></i> Teacher's leaderboard</h4>
                <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 255px;"><div class="message-box" scroll-box="" id="tchLdrBrd" height="255px" style="overflow: hidden; width: auto; height: 255px;">
                    <div class="message-widget message-scroll">
                        <!-- Message -->
                        <!-- ngRepeat: student in dashboardData.teacherLeaderBoard --><a href="javascript:void(0)" ng-click="studentProfile( student.id )" ng-repeat="student in dashboardData.teacherLeaderBoard" class="ng-scope">
                            <div class="user-img"> <img ng-src="index.php/dashboard/profileImage/10" alt="Khalled Abd Elmegeed" class="img-circle" src="index.php/dashboard/profileImage/10"> </div>
                            <div class="mail-contnet">
                                <h5 class="ng-binding">Khalled Abd Elmegeed</h5> <span class="mail-desc ng-binding">Very Good Teacher</span>
                            </div>
                        </a><!-- end ngRepeat: student in dashboardData.teacherLeaderBoard -->

                    </div>
                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 255px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
        </div>
    </div>

</div>

<div class="row ng-scope">

    <div class="col-lg-4 col-md-3" ng-show="$root.can('dashboard.celebBirthday')">
        <div class="card">
            <div class="card-block" style="overflow: visible;">
                <h4 class="card-title ng-binding"><i class="fa fa-birthday-cake"></i> Celebrating birthday</h4>
                <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 255px;"><div class="message-box" scroll-box="" id="birthdayCeleb" height="255px" style="overflow: hidden; width: auto; height: 255px;">
                    <div class="message-widget message-scroll">
                        <!-- Message -->
                        <!-- ngRepeat: user in dashboardData.birthday -->
                        <span style="display: block; text-align: center;padding:20px;" ng-show="!dashboardData.birthday.length" class="ng-binding">No Data Available</span>

                    </div>
                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 255px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
        </div>
    </div>

    <div class="col-lg-8 col-md-9" ng-show="$root.can('dashboard.quicklinks')">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title ng-binding"><i class="fa fa-link"></i> Quick links</h4>
                <div class="row">
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('Messages.list')"><a href="portal#/messages" class="btn btn-block btn-success ng-binding"> Messages </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('newsboard')"><a href="portal#newsboard" class="btn btn-block btn-success ng-binding"> News Board </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('events')"><a href="portal#events" class="btn btn-block btn-success ng-binding"> Events </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('classSch')"><a href="portal#classschedule" class="btn btn-block btn-success ng-binding"> Class Schedule </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('vclassSch')"><a href="portal#vclassschedule" class="btn btn-block btn-success ng-binding"> Virtual Class Schedule </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('mailsms')"><a href="portal#mailsms" class="btn btn-block btn-success ng-binding"> Mail / SMS</a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('mobileNotifications')"><a href="portal#mobileNotif" class="btn btn-block btn-success ng-binding"> Mobile Notifications</a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('Vacation.reqVacation')"><a href="portal#/vacation" class="btn btn-block btn-success ng-binding"> Request vacation </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('staffAttendance')"><a href="portal#staffAttendance" class="btn btn-block btn-success ng-binding"> Staff Attendance </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('Attendance')"><a href="portal#attendance" class="btn btn-block btn-success ng-binding"> Attendance</a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('Reports')"><a href="portal#reports" class="btn btn-block btn-success ng-binding"> Reports </a></div>
                    <div class="col-md-4 ng-hide" style="margin-bottom: 10px;" ng-show="adminHasPerm('generalSettings')"><a href="portal#settings" class="btn btn-block btn-success ng-binding"> General Settings</a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('examsList')"><a href="portal#examsList" class="btn btn-block btn-success ng-binding"> Exams List </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('studyMaterial')"><a href="portal#materials" class="btn btn-block btn-success ng-binding"> Study Material </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('Assignments')"><a href="portal#assignments" class="btn btn-block btn-success ng-binding"> Assignments </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('Homework')"><a href="portal#homework" class="btn btn-block btn-success ng-binding"> Homework </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('onlineExams')"><a href="portal#onlineExams" class="btn btn-block btn-success ng-binding"> Online exams </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('students')"><a href="portal#students" class="btn btn-block btn-success ng-binding"> Students </a></div>
                    <div class="col-md-4" style="margin-bottom: 10px;" ng-show="adminHasPerm('mediaCenter')"><a href="portal#/media" class="btn btn-block btn-success ng-binding"> Media Center </a></div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row ng-scope ng-hide" ng-show="dashboardData.invoices">

    <div class="col-12">
        <div class="card">
            <div class="row">
                <div class="col-lg-8">
                    <div class="p-20">
                        <h2 class="font-medium text-inverse ng-binding"> <i class="mdi mdi-currency-usd"></i> Invoices</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center hidden-sm-down">#</th>
                                    <th class="ng-binding">Title</th>
                                    <th class="ng-binding">Status</th>
                                    <th class="hidden-sm-down ng-binding">Date</th>
                                    <th class="hidden-sm-down ng-binding">Due Date</th>
                                    <th class="hidden-sm-down ng-binding">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ngRepeat: invoice in dashboardData.invoices -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 b-l">
                    <div class="card-block">

                        <div id="m-piechart" invoce-dougnuts="" style="width: 100%; height: 278px; -webkit-tap-highlight-color: transparent; user-select: none; background-color: rgba(0, 0, 0, 0);" _echarts_instance_="1633451624892"><div style="position: relative; overflow: hidden; width: 100px; height: 278px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 346px; height: 278px; user-select: none;"></div><canvas width="125" height="347.5" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 100px; height: 278px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="125" height="347.5" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 100px; height: 278px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="125" height="347.5" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 100px; height: 278px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas></div></div>
                        <center>
                            <ul class="list-inline m-t-20">
                                <li>
                                    <h6 class="text-muted ng-binding"><i class="fa fa-circle m-r-5 text-primary"></i>Invoices</h6>
                                </li>
                                <li>
                                    <h6 class="text-muted ng-binding"><i class="fa fa-circle m-r-5 text-danger"></i>Due Invoices</h6>
                                </li>
                            </ul>
                        </center>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row ng-scope">

    <div class="col-md-4" ng-show="adminHasPerm('newsboard.') || adminHasPerm('events.')">

        <div class="card" style="overflow: visible;">
            <div class="card-block">
                <h4 class="card-title ng-binding"> <i class="mdi mdi-bullhorn"></i> News &amp; Events</h4>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 300px;"><div class="table-responsive" scroll-box="" id="nwsEvts" height="300px" style="overflow: hidden; width: auto; height: 300px;">
                <table class="table table-hover">
                    <tbody>
                        <!-- ngRepeat: item in dashboardData.newsEvents --><tr ng-repeat="item in dashboardData.newsEvents" class="ng-scope">
                            <!-- ngIf: item.type == 'news' --><td class="txt-oflo ng-scope" ng-if="item.type == 'news'"><a href="index.php/portal#newsboard/2" class="ng-binding">Holiday road safety reminder </a></td><!-- end ngIf: item.type == 'news' -->
                            <!-- ngIf: item.type == 'event' -->
                            <!-- ngIf: item.type == 'news' --><td ng-if="item.type == 'news'" class="ng-scope"><span class="label label-success label-rouded text-center ng-binding" style="width:90px;">News Board</span> </td><!-- end ngIf: item.type == 'news' -->
                            <!-- ngIf: item.type == 'event' -->
                        </tr><!-- end ngRepeat: item in dashboardData.newsEvents --><tr ng-repeat="item in dashboardData.newsEvents" class="ng-scope">
                            <!-- ngIf: item.type == 'news' -->
                            <!-- ngIf: item.type == 'event' --><td class="txt-oflo ng-scope" ng-if="item.type == 'event'"><a href="index.php/portal#events/1" class="ng-binding">Education Week</a></td><!-- end ngIf: item.type == 'event' -->
                            <!-- ngIf: item.type == 'news' -->
                            <!-- ngIf: item.type == 'event' --><td ng-if="item.type == 'event'" class="ng-scope"><span class="label label-primary label-rouded text-center ng-binding" style="width:90px;">Events</span> </td><!-- end ngIf: item.type == 'event' -->
                        </tr><!-- end ngRepeat: item in dashboardData.newsEvents -->
                    </tbody>
                </table>
            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
        </div>

    </div>
    
    <div class="col-md-4">

        <div class="card" ng-show="dashboardData.activatedModules.indexOf('messagesAct') > -1 &amp;&amp; adminHasPerm('Messages.list')">
            <div class="card-block" style="overflow: visible;">
                <h4 class="card-title ng-binding"> <i class="mdi mdi-message-text-outline"></i> Messages</h4>
                <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 300px;"><div class="message-box" scroll-box="" id="megs" height="300px" style="overflow: hidden; width: auto; height: 300px;">
                    <div class="message-widget message-scroll">
                        <!-- Message -->
                        <!-- ngRepeat: message in dashboardData.messages --><a href="portal#messages/8" ng-repeat="message in dashboardData.messages" class="ng-scope">
                            <div class="user-img"> <img width="45" height="45" ng-src="index.php/dashboard/profileImage/7" alt="Ahmed Mohamed Ebrahim" class="img-circle" src="index.php/dashboard/profileImage/7"> </div>
                            <div class="mail-contnet">
                                <h5 class="ng-binding">Ahmed Mohamed Ebrahim</h5> <span class="mail-desc ng-binding">Hello</span>
                                <span class="time ng-binding">06/09/2021 02:30 pm</span>
                            </div>
                        </a><!-- end ngRepeat: message in dashboardData.messages --><a href="portal#messages/6" ng-repeat="message in dashboardData.messages" class="ng-scope">
                            <div class="user-img"> <img width="45" height="45" ng-src="index.php/dashboard/profileImage/6" alt="Ahmed Mohamed Elbasha" class="img-circle" src="index.php/dashboard/profileImage/6"> </div>
                            <div class="mail-contnet">
                                <h5 class="ng-binding">Ahmed Mohamed Elbasha</h5> <span class="mail-desc ng-binding">Hello</span>
                                <span class="time ng-binding">06/09/2021 02:30 pm</span>
                            </div>
                        </a><!-- end ngRepeat: message in dashboardData.messages -->

                    </div>
                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
        </div>

    </div>
    <div class="col-md-4">
    
        <div class="card" ng-show="dashboardData.activatedModules.indexOf('onlineMeetingsAct') > -1">
            <div class="card-block" style="overflow: visible;">
                <h4 class="card-title ng-binding"> <i class="mdi mdi-video"></i> Meetings</h4>
                <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 300px;"><div scroll-box="" id="meetings" height="300px" style="overflow: hidden; width: auto; height: 300px;">

                    <!-- Message -->
                    <ul class="nav nav-pills custom-pills m-t-20 ng-hide" id="pills-tab2" role="tablist" ng-show="dashboardData.conferences.current.length > 0 || dashboardData.conferences.next.length > 0">
                        <li class="nav-item ng-hide" ng-show="dashboardData.conferences.current.length > 0">
                            <a class="nav-link ng-binding" style="padding-top:9px;" ng-class="{'active':dashboardData.conferences.current.length > 0}" id="current-active-tab" data-toggle="pill" href="#current" role="tab" aria-selected="true">Current active</a>
                        </li>
                        <li class="nav-item ng-hide" ng-show="dashboardData.conferences.next.length > 0">
                            <a class="nav-link ng-binding" style="padding-top:9px;" ng-class="{'active':dashboardData.conferences.current.length == 0}" id="next-conf-tab" data-toggle="pill" href="#next" role="tab" aria-selected="false">Upcoming Meetings</a>
                        </li>
                    </ul>
                    <div class="tab-content m-t-20" id="pills-tabContent2">
                        <div class="tab-pane fade ng-hide" ng-class="{'active show':dashboardData.conferences.current.length > 0}" id="current" role="tabpanel" aria-labelledby="current-active-tab" ng-show="dashboardData.conferences.current.length > 0">
                            <div class="table-responsive">
                    
                                <table class="table table-bordered ng-hide" ng-show="dashboardData.conferences.current.length > 0">
                                    <tbody>
                                        <!-- ngRepeat: meeting in dashboardData.conferences.current -->
                                    </tbody>
                                </table>
                    
                            </div>
                        </div>
                        <div class="tab-pane fade ng-hide" ng-class="{'active show':dashboardData.conferences.current.length == 0}" id="next" role="tabpanel" aria-labelledby="next-conf-tab" ng-show="dashboardData.conferences.next.length > 0">
                            <div class="table-responsive">
                    
                                <table class="table table-bordered ng-hide" ng-show="dashboardData.conferences.next.length > 0">
                                    <tbody>
                                        <!-- ngRepeat: meeting in dashboardData.conferences.next track by $index -->
                                    </tbody>
                                </table>
                    
                            </div>
                        </div>
                    </div>
                    <span ng-show="!dashboardData.conferences" class="ng-binding">No meetings available.</span>
    
                </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
        </div>
    
    </div>
</div>

<div class="row ng-scope">
    <div class="col-md-8">

        <div class="row ng-hide" ng-show="dashboardData.role == 'student' || dashboardData.role == 'parent'">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title ng-binding"> <i class="mdi mdi-check-all"></i> Attendance</h4>

                        <!-- ngIf: dashboardData.role == 'student' -->

                        <!-- ngIf: dashboardData.role == 'parent' -->

                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-block" style="overflow: visible;">
                        <h4 class="card-title ng-binding"> <i class="mdi mdi-timelapse"></i> Classes Schedule</h4>

                        <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 400px;"><div scroll-box="" id="classSchDb" height="400px" style="overflow: hidden; width: auto; height: 400px;">
                            <table class="table table-bordered table-hover" ng-show="dashboardData.role != 'parent'">
                                <tbody>
                                    <tr>
                                        <th>
                                            <span ng-show="$root.dashboardData.enableSections != '1'" class="ng-binding ng-hide">
                                                Class name
                                            </span>
                                            <span ng-show="$root.dashboardData.enableSections == '1'" class="ng-binding">
                                                Section name
                                            </span>
                                        </th>
                                        <th class="ng-binding">Subject</th>
                                        <th class="ng-binding">Time</th>
                                    </tr>
                                    <!-- ngRepeat: value in dashboardData.schedule -->
                                </tbody>
                            </table>

                            <!-- ngRepeat: std in dashboardData.scheduleStd -->
                        </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 400px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>

                    </div>
                </div>
				<div class="card">
                    <div class="card-block" style="overflow: visible;">
                        <h4 class="card-title ng-binding"> <i class="mdi mdi-timelapse"></i> Virtual Classes Schedule</h4>

                        <div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 400px;"><div scroll-box="" id="vclassSchDb" height="400px" style="overflow: hidden; width: auto; height: 400px;">
                            <table class="table table-bordered table-hover" ng-show="dashboardData.role != 'parent'">
                                <tbody>
                                    <tr>
                                        <th>
                                            <span ng-show="$root.dashboardData.enableSections != '1'" class="ng-binding ng-hide">
                                                Class name
                                            </span>
                                            <span ng-show="$root.dashboardData.enableSections == '1'" class="ng-binding">
                                                Section name
                                            </span>
                                        </th>
                                        <th class="ng-binding">Subject</th>
                                        <th class="ng-binding">Time</th>
                                    </tr>
                                    <!-- ngRepeat: value in dashboardData.schedule -->
                                </tbody>
                            </table>

                            <!-- ngRepeat: std in dashboardData.scheduleStd -->
                        </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 400px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>

                    </div>
                </div>

            </div>
        </div>

        <div class="card ng-hide" ng-show="dashboardData.polls">
            <div class="card-block">
                <h4 class="card-title ng-binding"> <i class="fa fa-bar-chart-o"></i> </h4>

                <div ng-show="dashboardData.polls.view == 'vote'" class="ng-hide">
                    <!-- ngRepeat: value in dashboardData.polls.items -->
                </div>
                <div class="form-group ng-hide" ng-show="dashboardData.polls.view == 'results'">
                    <!-- ngRepeat: value in dashboardData.polls.items -->
                    <div class="text-center ng-binding">Total votes : </div>
                </div>

                <!-- ngIf: !dashboardData.polls.voted --><div ng-if="!dashboardData.polls.voted" class="box-footer clearfix ng-scope">
                    <button style="margin:5px;" ng-click="dashboardData.polls.view = 'vote'" ng-show="dashboardData.polls.view == 'results'" type="button" class="pull-right btn btn-info ng-binding ng-hide">Return</button>
                    <button style="margin:5px;" ng-click="dashboardData.polls.view = 'results'" ng-show="dashboardData.polls.view == 'vote'" type="button" class="pull-right btn btn-primary ng-binding ng-hide">View Votes</button>
                    <button style="margin:5px;" ng-show="dashboardData.polls.view == 'vote'" ng-click="savePollVote()" ng-disabled="!dashboardData.polls.selected" class="pull-right btn btn-primary ng-binding ng-hide" disabled="disabled">Vote poll</button>
                </div><!-- end ngIf: !dashboardData.polls.voted -->

            </div>
        </div>

    </div>
    <div class="col-md-4" ng-show="$root.can('dashboard.Calendar')">

        <div class="card">
            <div class="card-block">
                <h4 class="card-title ng-binding"> <i class="fa fa-calendar"></i> Calendar</h4>

                <div class="row">

                    <div id="calendar" class="fullPageCalendar miniCal is-calendarsPicker" calendar-box=""><div class="calendars" style="width: 220px;"><div class="calendars-nav"><a href="javascript:void(0)" title="Show the previous month" class="calendars-cmd calendars-cmd-prev "><i class="fa fa-angle-left"></i></a><a href="javascript:void(0)" title="Show today's month" class="calendars-cmd calendars-cmd-today ">Today</a><a href="javascript:void(0)" title="Show the next month" class="calendars-cmd calendars-cmd-next "><i class="fa fa-angle-right"></i></a></div><div class="calendars-month-row"><div class="calendars-month"><div class="calendars-month-header"><select class="calendars-month-year" title="Change the month"><option value="1/2021">January</option><option value="2/2021">February</option><option value="3/2021">March</option><option value="4/2021">April</option><option value="5/2021">May</option><option value="6/2021">June</option><option value="7/2021">July</option><option value="8/2021">August</option><option value="9/2021">September</option><option value="10/2021" selected="selected">October</option><option value="11/2021">November</option><option value="12/2021">December</option></select> <select class="calendars-month-year" title="Change the year"><option value="10/2001">&nbsp;&nbsp;▲</option><option value="10/2011">2011</option><option value="10/2012">2012</option><option value="10/2013">2013</option><option value="10/2014">2014</option><option value="10/2015">2015</option><option value="10/2016">2016</option><option value="10/2017">2017</option><option value="10/2018">2018</option><option value="10/2019">2019</option><option value="10/2020">2020</option><option value="10/2021" selected="selected">2021</option><option value="10/2022">2022</option><option value="10/2023">2023</option><option value="10/2024">2024</option><option value="10/2025">2025</option><option value="10/2026">2026</option><option value="10/2027">2027</option><option value="10/2028">2028</option><option value="10/2029">2029</option><option value="10/2030">2030</option><option value="10/2031">2031</option><option value="10/2041">&nbsp;&nbsp;▼</option></select></div><table><thead><tr><th><span class="calendars-dow-0" title="Sunday">Su</span></th><th><span class="calendars-dow-1" title="Monday">Mo</span></th><th><span class="calendars-dow-2" title="Tuesday">Tu</span></th><th><span class="calendars-dow-3" title="Wednesday">We</span></th><th><span class="calendars-dow-4" title="Thursday">Th</span></th><th><span class="calendars-dow-5" title="Friday">Fr</span></th><th><span class="calendars-dow-6" title="Saturday">Sa</span></th></tr></thead><tbody><tr><td><span class="jd2459483.5 jdd26-09-2021  calendars-weekend calendars-other-month">&nbsp;</span></td><td><span class="jd2459484.5 jdd27-09-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459485.5 jdd28-09-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459486.5 jdd29-09-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459487.5 jdd30-09-2021  calendars-other-month">&nbsp;</span></td><td><a href="javascript:void(0)" class="jd2459488.5 jdd01-10-2021" title="Select Friday, Oct 1, 2021">1</a></td><td><a href="javascript:void(0)" class="jd2459489.5 jdd02-10-2021   calendars-weekend" title="Select Saturday, Oct 2, 2021">2</a></td></tr><tr><td><a href="javascript:void(0)" class="jd2459490.5 jdd03-10-2021   calendars-weekend" title="Select Sunday, Oct 3, 2021">3</a></td><td><a href="javascript:void(0)" class="jd2459491.5 jdd04-10-2021" title="Select Monday, Oct 4, 2021">4</a></td><td><a href="javascript:void(0)" class="jd2459492.5 jdd05-10-2021   calendars-today" title="Select Tuesday, Oct 5, 2021">5</a></td><td><a href="javascript:void(0)" class="jd2459493.5 jdd06-10-2021" title="Select Wednesday, Oct 6, 2021">6</a></td><td><a href="javascript:void(0)" class="jd2459494.5 jdd07-10-2021" title="Select Thursday, Oct 7, 2021">7</a></td><td><a href="javascript:void(0)" class="jd2459495.5 jdd08-10-2021" title="Select Friday, Oct 8, 2021">8</a></td><td><a href="javascript:void(0)" class="jd2459496.5 jdd09-10-2021   calendars-weekend" title="Select Saturday, Oct 9, 2021">9</a></td></tr><tr><td><a href="javascript:void(0)" class="jd2459497.5 jdd10-10-2021   calendars-weekend" title="Select Sunday, Oct 10, 2021">10</a></td><td><a href="javascript:void(0)" class="jd2459498.5 jdd11-10-2021" title="Select Monday, Oct 11, 2021">11</a></td><td><a href="javascript:void(0)" class="jd2459499.5 jdd12-10-2021" title="Select Tuesday, Oct 12, 2021">12</a></td><td><a href="javascript:void(0)" class="jd2459500.5 jdd13-10-2021" title="Select Wednesday, Oct 13, 2021">13</a></td><td><a href="javascript:void(0)" class="jd2459501.5 jdd14-10-2021" title="Select Thursday, Oct 14, 2021">14</a></td><td><a href="javascript:void(0)" class="jd2459502.5 jdd15-10-2021" title="Select Friday, Oct 15, 2021">15</a></td><td><a href="javascript:void(0)" class="jd2459503.5 jdd16-10-2021   calendars-weekend" title="Select Saturday, Oct 16, 2021">16</a></td></tr><tr><td><a href="javascript:void(0)" class="jd2459504.5 jdd17-10-2021   calendars-weekend" title="Select Sunday, Oct 17, 2021">17</a></td><td><a href="javascript:void(0)" class="jd2459505.5 jdd18-10-2021" title="Select Monday, Oct 18, 2021">18</a></td><td><a href="javascript:void(0)" class="jd2459506.5 jdd19-10-2021" title="Select Tuesday, Oct 19, 2021">19</a></td><td><a href="javascript:void(0)" class="jd2459507.5 jdd20-10-2021" title="Select Wednesday, Oct 20, 2021">20</a></td><td><a href="javascript:void(0)" class="jd2459508.5 jdd21-10-2021" title="Select Thursday, Oct 21, 2021">21</a></td><td><a href="javascript:void(0)" class="jd2459509.5 jdd22-10-2021" title="Select Friday, Oct 22, 2021">22</a></td><td><a href="javascript:void(0)" class="jd2459510.5 jdd23-10-2021   calendars-weekend" title="Select Saturday, Oct 23, 2021">23</a></td></tr><tr><td><a href="javascript:void(0)" class="jd2459511.5 jdd24-10-2021   calendars-weekend" title="Select Sunday, Oct 24, 2021">24</a></td><td><a href="javascript:void(0)" class="jd2459512.5 jdd25-10-2021" title="Select Monday, Oct 25, 2021">25</a></td><td><a href="javascript:void(0)" class="jd2459513.5 jdd26-10-2021" title="Select Tuesday, Oct 26, 2021">26</a></td><td><a href="javascript:void(0)" class="jd2459514.5 jdd27-10-2021" title="Select Wednesday, Oct 27, 2021">27</a></td><td><a href="javascript:void(0)" class="jd2459515.5 jdd28-10-2021" title="Select Thursday, Oct 28, 2021">28</a></td><td><a href="javascript:void(0)" class="jd2459516.5 jdd29-10-2021" title="Select Friday, Oct 29, 2021">29</a></td><td><a href="javascript:void(0)" class="jd2459517.5 jdd30-10-2021   calendars-weekend" title="Select Saturday, Oct 30, 2021">30</a></td></tr><tr><td><a href="javascript:void(0)" class="jd2459518.5 jdd31-10-2021   calendars-weekend" title="Select Sunday, Oct 31, 2021">31</a></td><td><span class="jd2459519.5 jdd01-11-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459520.5 jdd02-11-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459521.5 jdd03-11-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459522.5 jdd04-11-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459523.5 jdd05-11-2021  calendars-other-month">&nbsp;</span></td><td><span class="jd2459524.5 jdd06-11-2021  calendars-weekend calendars-other-month">&nbsp;</span></td></tr></tbody></table></div></div><div class="calendars-clear-fix"></div></div></div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection