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

    #datatable-buttons_wrapper .row:last-of-type {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.inc.massage')
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Students</h4>
            </div>
        </div>
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
                        <div class="form-group">
                            <label>Search</label>
                            <input type="text" class="form-control" id="searchByAll">
                        </div>

                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" class="form-control" id="searchByEmail">
                        </div>
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
                        <div class="form-group">
                            <label>Class</label>
                            <select class="form-control" name="class" id="class">
                                <option value="0">not select</option>
                                @foreach($classes as $classe)

                                <option value="{{$classe->id}}">{{$classe->className}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Section name</label>
                            <select class="form-control" name="section" id="getSection">
                                <option value="0">not select</option>
                            </select>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-md-12">
                                <button type="button" id="btn_search" class="btn btn-info ">Advanced Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" id="card">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">List students</h5>

                    <div class="table-responsive">
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>import</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>List Graduate Students</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" id="search" aria-controls="datatable-buttons" type="button"><span>Advanced Search</span></button><button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button"><span>Waiting approval</span></button>
                                        <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="datatable-buttons" type="button" aria-haspopup="true" aria-expanded="false"><span>Students Admission</span></button></div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-sm-12">
                                    <table id="datatable-buttons" class="table table-striped table-bordered w-100 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 70px;">ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 400px;">Full Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 140.425px;">Username</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 400px;">Email Addres</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 260.6px;">Class / Section</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 160px;">Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody id="old_data">
                                            @foreach($students as $key => $student)
                                            <tr class="{{ $key%2==0 ? 'odd' : 'even'  }}  ">
                                                <td class="sorting_1 centers">{{$student->id}}</td>
                                                <td><img src='{{asset("assets/images/$student->photo")}}' alt="" class="header-profile-user rounded-circle me-2"> <a class="profile" data-name="{{$student->fullName}}" data-photo="{{$student->photo}}" data-birthday="{{$student->birthday}}" data-role="{{$student->role}}" data-user="{{$student->username}}" data-email="{{$student->email}}" data-gender="{{$student->gender}}" data-address="{{$student->address}}" data-phone="{{$student->phoneNo}}" data-mobe="{{$student->mobileNo}}" data-class="{{$student->class->className}}" data-section="{{$student->section->sectionName}} - {{$student->section->sectionTitle}}" data-parent="{{$student->parentOf}}" data-bs-toggle="modal" data-bs-target="#myModal">
                                                        {{$student->fullName}}</a>

                                                    @if($student->active)
                                                    <i class="far fa-lightbulb text-success "></i>
                                                    @else
                                                    <i class="far fa-lightbulb text-danger"></i>
                                                    @endif

                                                    @if($student->isLeaderBoard != null)
                                                    <span class="light">
                                                        <br><i class="fa fa-trophy"></i>
                                                        Leader Board
                                                        <a class="light" href='{{url("admin/teacher/delete_leader")}}/{{$student->id}}'><i class="fas fa-trash"></i></a>
                                                    </span>
                                                    @endif

                                                </td>
                                                <td class="centers">{{$student->username}}</td>
                                                <td class="centers">{{$student->email}}</td>
                                                <td class="centers">
                                                    {{$student->class->className}}<br>
                                                    {{$student->section->sectionName}}-{{$student->section->sectionTitle}}
                                                </td>
                                                <td class="centers">
                                                    <div class="btn-group-vertical">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Operations <i class="mdi mdi-chevron-down ms-1"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href='{{url("admin/student/attendace/$student->id")}}'><i class="fa fa-eye"></i>Attendance</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-table"></i> Marksheet</a>
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-center" onclick='passId("{{$student->id}}")'><i class="fa fa-trophy"></i> Leader Board</a>
                                                            <a class="dropdown-item" href="#"><i class="fa fa-stethoscope"></i> Medical History</a>
                                                            <a class="dropdown-item" href='{{url("admin/active_student/$student->id")}}'><i class="far fa-lightbulb"></i> Toggle Account Status</a>
                                                            <a class="dropdown-item" href='{{url("admin/student/edit/$student->id")}}'><i class="fas fa-pencil-alt"></i> Edit</a>
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-center2" onclick='setName("{{$student->fullName}}","{{$student->id}}")'><i class="fa fa-trash-o"></i> Remove</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tbody class="" id="filter">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="paginat">
                                {{$students->links('admin.inc.paginator')}}
                            </div>
                            <!-- paginator -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
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
                    <div class="text-center "><img class="user-image img-circle photo" style="width:70px; height:70px;" src="index.php/dashboard/profileImage/1120131"></div>
                    <h4>Student Information</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Full name</td>
                                <td class="fullname"></td>
                            </tr>
                            <tr>
                                <td>Roll id</td>
                                <td class="role"></td>
                            </tr>
                            <tr>
                                <td>Class</td>
                                <td class="classes"></td>
                            </tr>
                            <tr>
                                <td>Section</td>
                                <td class="section"></td>
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
                            <tr>
                                <td>Parent</td>
                                <td class="parent">no</td>
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
                    <input type="hidden" value="55" name="id" class="teacherId">
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
<div id="myModal" class="modal bs-example-modal-center2" tabindex="-1" aria-labelledby="myModalLabel" style="display: none; padding-left: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="myModalLabel">
                    Modal Heading</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Do you sure to remove student  <span id="nameStudent"></span></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                <a id="delete" class="btn btn-primary waves-effect waves-light">
                    remove</a>
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
    $('.profile').click(function() {
        let fullname = $(this).attr('data-name');
        let role = $(this).attr('data-role');
        let user = $(this).attr('data-user');
        let email = $(this).attr('data-email');
        let birthday = $(this).attr('data-birthday');
        let gender = $(this).attr('data-gender');
        let phone = $(this).attr('data-phone');
        let mobe = $(this).attr('data-mobe');
        let classes = $(this).attr('data-class');
        let section = $(this).attr('data-section');
        let parent = $(this).attr('data-parent');
        let address = $(this).attr('data-address');
        let photo = $(this).attr('data-photo')
        let img = '{{asset("assets/images")}}/' + photo
        $('.photo').attr('src', img);
        $('.fullname').text(fullname);
        $('.username').text(user);
        $('.email').text(email);
        $('.role').text(role);
        $('.gender').text(gender);
        $('.phone').text(phone);
        $('.mobe').text(mobe);
        $('.classes').text(classes);
        $('.section').text(section);
        $('.parent').text(parent);
        $('.address').text(address);
        $('.birthday').text(birthday);
    });

    function setName(nemeStudent,id) {
        console.log(nemeStudent)
        $("#delete").attr("href", "{{url('admin/student/delete/')}}/"+id)
        $('#nameStudent').text(nemeStudent)
    }
    function passId(id) {
        console.log(id);
        $('.teacherId').val(id);
    }

    $('#search').click(function() {
        $('#flex').toggleClass('flexs');
        $('#card').toggleClass('col-md-9');
        $('.col-md-3').toggleClass('d-none');
        $('.col-md-3').toggleClass('d-block');
        // console.log('yyyyyy');
    })

    $('#class').change(function() {
        id = $('#class').val();

        $.get("sections/" + id, function(data, status) {
            var allSction = data;
            var crtona = ` <option value="0">not select</option>`;
            for (var i = 0; i < allSction.length; i++) {
                crtona += `<option value="${allSction[i].id}">${allSction[i].sectionName} - ${allSction[i].sectionTitle}</option>`
            }
            document.getElementById("getSection").innerHTML = crtona;
        });
    });

    $('#btn_search').click(function() {
        $('#old_data').addClass('d-none')
        $('#paginat').addClass('d-none')
        var gender = $('input[name=gender]:checked').val();
        var classes = $('#class').val();
        var section = $('#getSection').val();
        console.log(gender + '-' + classes + '-' + section);

        $.get("apiStudent/" + gender + "/" + classes + "/" + section, function(data, status) {
            var allSction = data.data;

            // console.log(allSction)
            var crtona = ``;
            for (var i = 0; i < allSction.length; i++) {
                var active;
                if (allSction[i].active) {
                    active = "text-success";
                } else {
                    active = "text-danger";
                }
                if (i % 2 == 0) {
                    crtona += `
                <tr class="odd ">
                    <td class="sorting_1 centers">${allSction[i].id}</td>
                    <td><img src='{{asset("assets/images/")}}/${allSction[i].photo}' alt="" class="header-profile-user rounded-circle me-2"> <a id="newprofile"  onclick='profile("${allSction[i].fullName}","${allSction[i].photo}","${allSction[i].birthday}","${allSction[i].role}","${allSction[i].username}","${allSction[i].email}","${allSction[i].gender}","${allSction[i].address}","${allSction[i].phoneNo}","${allSction[i].mobileNo}","${allSction[i].class}","${allSction[i].section} - ${allSction[i].section}","${allSction[i].parentOf}")' data-bs-toggle="modal" data-bs-target="#myModal">
                            ${allSction[i].fullName}</a>
                            <i class="far fa-lightbulb ${active}" id="a_${i}"></i>

                    </td>
                    <td class="centers">${allSction[i].username}</td>
                    <td class="centers">${allSction[i].email}</td>
                    <td class="centers">
                        ${allSction[i].class}<br>
                        ${allSction[i].section}-${allSction[i].section_title}
                    </td>
                    <td class="centers">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Operations <i class="mdi mdi-chevron-down ms-1"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Attendance</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-table"></i> Marksheet</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-trophy"></i> Leader Board</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-stethoscope"></i> Medical History</a>
                                <a class="dropdown-item" onclick='activeEdit("${allSction[i].id}","a_${i}")'><i class="far fa-lightbulb"></i> Toggle Account Status</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Remove</a>
                            </div>
                        </div>
                    </td>
                </tr>                
                `
                } else {
                    crtona += `
                            <tr class="even ">
                            <td class="sorting_1 centers">${allSction[i].id}</td>
                    <td><img src='{{asset("assets/images/")}}/${allSction[i].photo}' alt="" class="header-profile-user rounded-circle me-2"> <a id="newprofile"  onclick='profile("${allSction[i].fullName}","${allSction[i].photo}","${allSction[i].birthday}","${allSction[i].role}","${allSction[i].username}","${allSction[i].email}","${allSction[i].gender}","${allSction[i].address}","${allSction[i].phoneNo}","${allSction[i].mobileNo}","${allSction[i].class}","${allSction[i].section} - ${allSction[i].section}","${allSction[i].parentOf}")' data-bs-toggle="modal" data-bs-target="#myModal">
                            ${allSction[i].fullName}</a>
                            <i class="far fa-lightbulb ${active}" id="a_${i}"></i>

                    </td>
                    <td class="centers">${allSction[i].username}</td>
                    <td class="centers">${allSction[i].email}</td>
                    <td class="centers">
                        ${allSction[i].class}<br>
                        ${allSction[i].section}-${allSction[i].section_title}
                    </td>
                    <td class="centers">
                        <div class="btn-group-vertical">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"> Operations <i class="mdi mdi-chevron-down ms-1"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Attendance</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-table"></i> Marksheet</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-trophy"></i> Leader Board</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-stethoscope"></i> Medical History</a>
                                <a class="dropdown-item" onclick='activeEdit("${allSction[i].id}","a_${i}")'><i class="far fa-lightbulb"></i> Toggle Account Status</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Remove</a>
                            </div>
                        </div>
                    </td>
                            </tr>                
                `
                }
            }
            // console.log(crtona)
            document.getElementById("filter").innerHTML = crtona;

            crtona = ``;
        });


    });

    function profile(fullname, photo, birthday, role, user, email, gender, address, phone, mobe, classes, section, parent) {
        // console.log(name);
        let img = '{{asset("assets/images")}}/' + photo
        $('.photo').attr('src', img);
        $('.fullname').text(fullname);
        $('.username').text(user);
        $('.email').text(email);
        $('.role').text(role);
        $('.gender').text(gender);
        $('.phone').text(phone);
        $('.mobe').text(mobe);
        $('.classes').text(classes);
        $('.section').text(section);
        $('.parent').text(parent);
        $('.address').text(address);
        $('.birthday').text(birthday);
    }

    function activeEdit(id, icon_id) {
        console.log(id)
        console.log('#' + icon_id)
        $.get("edit_active/" + id, function(data, status) {
            var allSction = data;
            if ($("#" + icon_id).hasClass("text-success")) {
                $("#" + icon_id).removeClass('text-success')
                $("#" + icon_id).addClass('text-danger')

            } else if ($("#" + icon_id).hasClass("text-danger")) {
                $("#" + icon_id).removeClass('text-danger')
                $("#" + icon_id).addClass('text-success')
            }
        });

    }
</script>
@endsection
@endsection