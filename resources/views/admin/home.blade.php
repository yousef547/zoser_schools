@extends('layouts.layout')
@section('title')
HomePage
@endsection
@section('styles')
<style>
    .btn-block {
        width: 100%;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Amezia</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 align-self-center">
                                <div class="icon-info">
                                    <i class="mdi mdi-diamond text-warning"></i>
                                </div>
                            </div>
                            <div class="col-8 align-self-center text-center">
                                <div class="ms-2 text-end">
                                    <p class="mb-1 text-muted font-size-13">Classes</p>
                                    <h4 class="mb-1 font-size-20">{{$classes}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-2" style="height:3px;">
                            <div class="progress-bar progress-animated  bg-dark" role="progressbar" style="max-width: {{$classes}}px" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 align-self-center">
                                <div class="icon-info">
                                    <i class="mdi mdi-diamond text-warning"></i>
                                </div>
                            </div>
                            <div class="col-8 align-self-center text-center">
                                <div class="ms-2 text-end">
                                    <p class="mb-1 text-muted font-size-13">Message</p>
                                    <h4 class="mb-1 font-size-20">{{$student}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-2" style="height:3px;">
                            <div class="progress-bar progress-animated  bg-info" role="progressbar" style="max-width: {{$student}}px" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 align-self-center">
                                <div class="icon-info">
                                    <i class="mdi mdi-diamond text-warning"></i>
                                </div>
                            </div>
                            <div class="col-8 align-self-center text-center">
                                <div class="ms-2 text-end">
                                    <p class="mb-1 text-muted font-size-13">Student</p>
                                    <h4 class="mb-1 font-size-20">{{$student}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-2" style="height:3px;">
                            <div class="progress-bar progress-animated  bg-warning" role="progressbar" style="max-width: {{$student}}px" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 align-self-center">
                                <div class="icon-info">
                                    <i class="mdi mdi-account-multiple text-purple"></i>
                                </div>
                            </div>
                            <div class="col-8 align-self-center text-center">
                                <div class="ms-2 text-end">
                                    <p class="mb-1 text-muted font-size-13">Parent</p>
                                    <h4 class="mb-1 font-size-20">{{$parent}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-2" style="height:3px;">
                            <div class="progress-bar progress-animated  bg-purple" role="progressbar" style="max-width: {{$parent}}px;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 align-self-center">
                                <div class="icon-info">
                                    <i class="mdi mdi-playlist-check text-success"></i>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-8 align-self-center text-center">
                                <div class="ms-2 text-end">
                                    <p class="mb-0 text-muted font-size-13">Teacher</p>
                                    <span class="font-size-20"><strong>{{$teacher}}</strong></span>
                                    <span class="badge badge-soft-success mt-1 shadow-none">Active</span>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="progress mt-2" style="height:3px;">
                            <div class="progress-bar progress-animated  bg-success" role="progressbar" style="max-width: {{$teacher}}px;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
            <!-- <div class="col-md-3 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 col-4 align-self-center">
                                <div class="icon-info">
                                    <i class="mdi mdi-currency-usd text-pink"></i>
                                </div>
                            </div>
                            <div class="col-sm-8 col-8 align-self-center text-center">
                                <div class="ms-2 text-end">
                                    <p class="mb-1 text-muted font-size-13">Budget</p>
                                    <h4 class="mb-1 font-size-20">$18090</h4>
                                </div>
                            </div>
                        </div>
                        <div class="progress mt-2" style="height:3px;">
                            <div class="progress-bar progress-animated  bg-pink" role="progressbar" style="max-width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end col -->
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <div class="text-center">
                            <img src='{{asset("uploads/$authUser->photo")}}' alt="" class="rounded-circle img-thumbnail avatar-xl">
                            <div class="online-circle">
                                <i class="fas fa-circle text-success"></i>
                            </div>
                            <h4 class="mt-3"><sup>Name:</sup>{{$authUser->username}}</h4>
                            <h6 class="mt-3"><sup>Role:</sup>{{$authUser->role}}</h6>
                            <p class="text-muted font-size-13"><sup>Email:</sup>{{$authUser->email}}</p>
                            <a href="#" class="btn btn-primary btn-rounded px-5 my-2"><i class="ti-settings"></i>Account Setting</a><br>
                            <a href="#" class="btn btn-primary btn-rounded px-5 my-2"><i class="mdi mdi-message-text-outline"></i> Messages </a><br>
                            <form id="logout-forms" method="post" action="{{ url('logout') }}" style="display: none">
                                @csrf
                                <button type="submit"> submit</button>
                            </form>
                            <a href="#" id="logout-links" class="btn btn-primary btn-rounded px-5 my-2"><i class="fa fa-power-off"></i>Log out</a>

                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"><i class="fa fa-trophy"></i> Student's leaderboard</h4>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"><i class="fa fa-trophy"></i> Teacher's leaderboard</h4>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"><i class="fa fa-birthday-cake"></i> Celebrating birthday</h4>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-8">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"><i class="fa fa-link"></i> Quick links</h4>
                        <div class="row">

                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Messages </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> News Board </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Events </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Class Schedule </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Mail / SMS22 </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Mobile Notifications </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Request vacation </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Staff Attendace </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Attwndance </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Reports </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Exams List </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="{{url('admin/materials')}}" class="btn btn-block btn-success"> Study Material </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Assignments </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> HomeWork </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Online Exams </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="{{url('admin/student')}}" class="btn btn-block btn-success"> Student </a></div>
                            <div class="col-md-4" style="margin-bottom: 10px;"><a href="#" class="btn btn-block btn-success"> Media Center </a></div>
                        </div>
                    </div>

                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"> <i class="mdi mdi-bullhorn"></i> News &amp; Events</h4>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"> <i class="mdi mdi-message-text-outline"></i> Messages</h4>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"> <i class="mdi mdi-video"></i> Meetings</h4>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-8">
                <div class="card profile">
                    <div class="card-body">
                    </div>
                </div>
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card profile">
                    <div class="card-body">
                        <h4 class="card-title ng-binding"> <i class="fa fa-calendar"></i> Calendar</h4>
                        <div class="row">

                            <div id="calendar" class="fullPageCalendar miniCal is-calendarsPicker" calendar-box="">
                                <div class="calendars" style="width: 220px;">
                                    <div class="calendars-nav"><a href="javascript:void(0)" title="Show the previous month" class="calendars-cmd calendars-cmd-prev "><i class="fa fa-angle-left"></i></a><a href="javascript:void(0)" title="Show today's month" class="calendars-cmd calendars-cmd-today ">Today</a><a href="javascript:void(0)" title="Show the next month" class="calendars-cmd calendars-cmd-next "><i class="fa fa-angle-right"></i></a></div>
                                    <div class="calendars-month-row">
                                        <div class="calendars-month">
                                            <div class="calendars-month-header"><select class="calendars-month-year" title="Change the month">
                                                    <option value="1/2021">January</option>
                                                    <option value="2/2021">February</option>
                                                    <option value="3/2021">March</option>
                                                    <option value="4/2021">April</option>
                                                    <option value="5/2021">May</option>
                                                    <option value="6/2021">June</option>
                                                    <option value="7/2021">July</option>
                                                    <option value="8/2021">August</option>
                                                    <option value="9/2021">September</option>
                                                    <option value="10/2021" selected="selected">October</option>
                                                    <option value="11/2021">November</option>
                                                    <option value="12/2021">December</option>
                                                </select> <select class="calendars-month-year" title="Change the year">
                                                    <option value="10/2001">&nbsp;&nbsp;▲</option>
                                                    <option value="10/2011">2011</option>
                                                    <option value="10/2012">2012</option>
                                                    <option value="10/2013">2013</option>
                                                    <option value="10/2014">2014</option>
                                                    <option value="10/2015">2015</option>
                                                    <option value="10/2016">2016</option>
                                                    <option value="10/2017">2017</option>
                                                    <option value="10/2018">2018</option>
                                                    <option value="10/2019">2019</option>
                                                    <option value="10/2020">2020</option>
                                                    <option value="10/2021" selected="selected">2021</option>
                                                    <option value="10/2022">2022</option>
                                                    <option value="10/2023">2023</option>
                                                    <option value="10/2024">2024</option>
                                                    <option value="10/2025">2025</option>
                                                    <option value="10/2026">2026</option>
                                                    <option value="10/2027">2027</option>
                                                    <option value="10/2028">2028</option>
                                                    <option value="10/2029">2029</option>
                                                    <option value="10/2030">2030</option>
                                                    <option value="10/2031">2031</option>
                                                    <option value="10/2041">&nbsp;&nbsp;▼</option>
                                                </select></div>
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th><span class="calendars-dow-0" title="Sunday">Su</span></th>
                                                        <th><span class="calendars-dow-1" title="Monday">Mo</span></th>
                                                        <th><span class="calendars-dow-2" title="Tuesday">Tu</span></th>
                                                        <th><span class="calendars-dow-3" title="Wednesday">We</span></th>
                                                        <th><span class="calendars-dow-4" title="Thursday">Th</span></th>
                                                        <th><span class="calendars-dow-5" title="Friday">Fr</span></th>
                                                        <th><span class="calendars-dow-6" title="Saturday">Sa</span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><span class="jd2459483.5 jdd26-09-2021  calendars-weekend calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459484.5 jdd27-09-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459485.5 jdd28-09-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459486.5 jdd29-09-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459487.5 jdd30-09-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><a href="javascript:void(0)" class="jd2459488.5 jdd01-10-2021" title="Select Friday, Oct 1, 2021">1</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459489.5 jdd02-10-2021   calendars-weekend" title="Select Saturday, Oct 2, 2021">2</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0)" class="jd2459490.5 jdd03-10-2021   calendars-weekend" title="Select Sunday, Oct 3, 2021">3</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459491.5 jdd04-10-2021" title="Select Monday, Oct 4, 2021">4</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459492.5 jdd05-10-2021" title="Select Tuesday, Oct 5, 2021">5</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459493.5 jdd06-10-2021" title="Select Wednesday, Oct 6, 2021">6</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459494.5 jdd07-10-2021" title="Select Thursday, Oct 7, 2021">7</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459495.5 jdd08-10-2021" title="Select Friday, Oct 8, 2021">8</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459496.5 jdd09-10-2021   calendars-weekend" title="Select Saturday, Oct 9, 2021">9</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0)" class="jd2459497.5 jdd10-10-2021   calendars-weekend" title="Select Sunday, Oct 10, 2021">10</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459498.5 jdd11-10-2021" title="Select Monday, Oct 11, 2021">11</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459499.5 jdd12-10-2021" title="Select Tuesday, Oct 12, 2021">12</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459500.5 jdd13-10-2021" title="Select Wednesday, Oct 13, 2021">13</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459501.5 jdd14-10-2021" title="Select Thursday, Oct 14, 2021">14</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459502.5 jdd15-10-2021   calendars-today" title="Select Friday, Oct 15, 2021">15</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459503.5 jdd16-10-2021   calendars-weekend" title="Select Saturday, Oct 16, 2021">16</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0)" class="jd2459504.5 jdd17-10-2021   calendars-weekend" title="Select Sunday, Oct 17, 2021">17</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459505.5 jdd18-10-2021" title="Select Monday, Oct 18, 2021">18</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459506.5 jdd19-10-2021" title="Select Tuesday, Oct 19, 2021">19</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459507.5 jdd20-10-2021" title="Select Wednesday, Oct 20, 2021">20</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459508.5 jdd21-10-2021" title="Select Thursday, Oct 21, 2021">21</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459509.5 jdd22-10-2021" title="Select Friday, Oct 22, 2021">22</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459510.5 jdd23-10-2021   calendars-weekend" title="Select Saturday, Oct 23, 2021">23</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0)" class="jd2459511.5 jdd24-10-2021   calendars-weekend" title="Select Sunday, Oct 24, 2021">24</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459512.5 jdd25-10-2021" title="Select Monday, Oct 25, 2021">25</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459513.5 jdd26-10-2021" title="Select Tuesday, Oct 26, 2021">26</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459514.5 jdd27-10-2021" title="Select Wednesday, Oct 27, 2021">27</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459515.5 jdd28-10-2021" title="Select Thursday, Oct 28, 2021">28</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459516.5 jdd29-10-2021" title="Select Friday, Oct 29, 2021">29</a></td>
                                                        <td><a href="javascript:void(0)" class="jd2459517.5 jdd30-10-2021   calendars-weekend" title="Select Saturday, Oct 30, 2021">30</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><a href="javascript:void(0)" class="jd2459518.5 jdd31-10-2021   calendars-weekend" title="Select Sunday, Oct 31, 2021">31</a></td>
                                                        <td><span class="jd2459519.5 jdd01-11-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459520.5 jdd02-11-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459521.5 jdd03-11-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459522.5 jdd04-11-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459523.5 jdd05-11-2021  calendars-other-month">&nbsp;</span></td>
                                                        <td><span class="jd2459524.5 jdd06-11-2021  calendars-weekend calendars-other-month">&nbsp;</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="calendars-clear-fix"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
    <!-- end page title -->


</div>
@section('script')

<script>
    $('#logout-links').click(function(e) {
        e.preventDefault();
        $('#logout-forms').submit();
        console.log('yyyyyy')
    });
</script>
@endsection

@endsection