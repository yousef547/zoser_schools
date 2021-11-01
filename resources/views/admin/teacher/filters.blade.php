@extends('layouts.layout')
@section('title')
HomePage
@endsection
@section('styles')
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
<!-- DataTables -->
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/intlTelInput.min.css')}}" rel="stylesheet" type="text/css" />

<style>
    .centers {
        text-align: center;
        padding-top: 30px !important;
    }

    .form-group {
        margin: 15px 0;
    }

    .flexs {
        display: flex;
        justify-content: end;
    }

    .light {
        color: #9ba1a8;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.inc.massage')
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Teacher</h4>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row" id="flex">
        <div class="col-md-3 d-none" id='close'>
            <div class="card card-outline-info">
                <div class="card-header bg-primary">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="text-light">Advanced Search</h4>
                        </div>
                        <div class="col-md-2">
                            <a class="fs-5 text-light" onclick="(function(){$('#close').addClass('d-none');$('#card').removeClass('col-md-9')})();return false;">x</a>
                        </div>
                    </div>
                </div>
                <div class="card-block">
                    <div class="m-2">
                        <form method="get" action="{{url('/admin/teacher/search')}}">
                        @csrf
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="radio-list">
                                    <label>
                                        <input type="radio" name="gender" value="male">
                                        Male
                                    </label>
                                </div>
                                <div class=" radio-list">
                                    <label>
                                        <input type="radio" name="gender" value="fmale">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="col-md-12">
                                    <button type="submit" id="btn_search" class="btn btn-info ">Advanced Search</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="" id="card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" id="search" aria-controls="datatable-buttons" type="button">
                                        <span>Advanced Search</span>
                                    </button>
                                    <a href="{{url('admin/teacher/create')}}" class="btn btn-secondary buttons-copy buttons-html5">add teacher</a>
                                </div>
                                <div class="col-sm-12">
                                    <table id="datatable-buttons" class="table table-striped table-bordered w-100 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5%;">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:25%;">Full name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20%">Username</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30%">Email address</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20%;">Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($teachers as $key => $teacher)
                                            <tr class="{{ $key%2==0 ? 'odd' : 'even'  }}" id="t_{{$teacher->id}}">
                                                <td class="sorting_1">{{$teacher->id}}</td>
                                                <td>
                                                    <a onclick='profile("{{$teacher->fullName}}", "{{$teacher->photo}}", "{{$teacher->birthday}}","{{$teacher->role}}", "{{$teacher->username}}", "{{$teacher->email}}","{{$teacher->gender}}","{{$teacher->address}}", "{{$teacher->phoneNo}}","{{$teacher->mobileNo}}")' data-bs-toggle="modal" data-bs-target="#myModal">{{$teacher->fullName}}</a>
                                                    @if($teacher->active)
                                                    <i class="far fa-lightbulb text-success " id="a_{{$teacher->id}}"></i>
                                                    @else
                                                    <i class="far fa-lightbulb text-danger" id="a_{{$teacher->id}}"></i>
                                                    @endif
                                                    <br>
                                                    @if($teacher->isLeaderBoard != null)
                                                    <span class="light">
                                                        <br><i class="fa fa-trophy"></i>
                                                        Leader Board
                                                        <a class="light" href='{{url("admin/teacher/delete_leader")}}/{{$teacher->id}}'><i class="fas fa-trash"></i></a>
                                                    </span>
                                                    @endif
                                                </td>
                                                <td>{{$teacher->username}}</td>
                                                <td>{{$teacher->email}}</td>
                                                <td>

                                                    <a class="btn btn-warning btn-rounded mx-1" onclick='goActive("{{$teacher->id}}")'>
                                                        <i class="far fa-lightbulb"></i>
                                                    </a>
                                                    @if($teacher->isLeaderBoard == null)
                                                    <a class="btn btn-success btn-rounded mx-1" onclick='passId("{{$teacher->id}}")' data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-center">
                                                        <i class="fa fa-trophy"></i>
                                                    </a>
                                                    @endif
                                                    <a href='{{url("admin/teacher/edit")}}/{{$teacher->id}}' class="btn btn-info btn-rounded mx-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a onclick='deleteTeacher("{{$teacher->id}}")' class="btn btn-danger btn-rounded mx-1">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="myModalLabel">Profile <span class="fullname"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div ng-bind-html="modalContent" class="ng-binding ng-scope">
                    <div class="text-center "><img class="user-image img-circle photo" style="width:70px; height:70px;" src=""></div>
                    <h4>Student Information</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Full name</td>
                                <td class="fullname"></td>
                            </tr>
                            <tr>
                                <td>Roll</td>
                                <td class="role"></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td class="username"></td>
                            </tr>
                            <tr>
                                <td>Email address</td>
                                <td class="email"></td>
                            </tr>
                            <tr>
                                <td>Birthday</td>
                                <td class="birthday"></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td class="gender"></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td class="address"> </td>
                            </tr>
                            <tr>
                                <td>Phone No</td>
                                <td class="phone"></td>
                            </tr>
                            <tr>
                                <td>Mobile No</td>
                                <td class="mobe"></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade bs-example-modal-center show" tabindex="-1" aria-labelledby="mySmallModalLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('admin/teacher/leaderboard')}}">
                    @csrf
                    <input type="hidden" name="id" class="teacherId">
                    <label class="form-label">Please enter leaderboard message</label>
                    <textarea class="form-control" id="field-7" name="massage" placeholder="Please enter leaderboard message" style="margin-top: 0px; margin-bottom: 0px; height: 137px;"></textarea>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@section('script')
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<!-- <script src="{{asset('assets/js/intlTelInput.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{asset('assets/js/intlTelInput-jquery.min.js')}}"></script> -->


<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script>
    function profile(fullname, photo, birthday, role, user, email, gender, address, phone, mobe) {
        if (photo == '') {
            photo = 'teacher/not_user.png'
        }
        let img = '{{asset("uploads")}}/' + photo
        $('.photo').attr('src', img);
        $('.fullname').text(fullname);
        $('.username').text(user);
        $('.email').text(email);
        $('.role').text(role);
        $('.gender').text(gender);
        $('.phone').text(phone);
        $('.mobe').text(mobe);
        $('.address').text(address);
        $('.birthday').text(birthday);
    }

    function goActive(id) {
        $.get("active/" + id, function(data, status) {
            if ($("#a_" + id).hasClass("text-success")) {
                $("#a_" + id).removeClass('text-success')
                $("#a_" + id).addClass('text-danger')
            } else if ($("#a_" + id).hasClass("text-danger")) {
                $("#a_" + id).removeClass('text-danger')
                $("#a_" + id).addClass('text-success')
            }
        })
    }

    function passId(id) {
        $('.teacherId').val(id);
    }

    function deleteTeacher(id) {
        $.get("delete/" + id, function(data, status) {
            console.log(data.msg);
            $("#t_" + id).addClass('d-none');
        })
    }


    $('#search').click(function() {
        $('#flex').toggleClass('flexs');
        $('#card').toggleClass('col-md-9');
        $('.col-md-3').toggleClass('d-none');
        $('.col-md-3').toggleClass('d-block');
        // console.log('yyyyyy');
    })
</script>


@endsection
@endsection