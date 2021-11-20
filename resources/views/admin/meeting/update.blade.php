@extends('layouts.layout')
@section('title')
subjects
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
    .dataTables_length {
        display: none;
    }

    .name_host {
        border: 1px solid #ccc;
        padding: 12px;
        font-size: 15px;
        border-radius: 4px;
        margin-top: 5px;
    }

    /* .dt-bootstrap4 .row:last-of-type>.col-md-5,
    .dt-bootstrap4 .row:last-of-type>.col-md-7 {
        display: none;
    } */
</style>
@endsection
@section('content')
<div class="container-fluid">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Meetings</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Meeting</h5>

                    <div>

                        <form method="POST" action="{{url('admin/meeting/edit')}}">
                            @csrf
                            <input type="hidden" name="idm" value="{{$users->id}}">
                            <div class="mb-3 ">
                                <label for="example-password-input1" class="form-label">Meeting Title</label>
                                <div class="">
                                    <input class="form-control" value="{{$users->conference_title}}" type="text" id="example-password-input1" name="meeting_title" placeholder="Meeting Title">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-password-input1" class="form-label">Meeting Description</label>
                                <div class="">
                                    <textarea class="form-control" rows="13" cols="20" name="meeting_description" placeholder="Meeting Description">{{$users->conference_desc}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="example-password-input1" class="form-label">Meeting Host </label>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-center">search users</button>
                                <div id="hostUser" class="">
                                    <p class="name_host" id="n_host">{{$users->user_host('user')}}</p>
                                    <input type="text" class="form-control mt-2" name="user_host" hidden value="{{$users->user_host('user')}}">
                                    <input type="number" class="form-control mt-2" name="id" hidden value="{{$users->user_host('id')}}">
                                </div>
                            </div>
                            <label class="col-sm-2 form-label">Type of users </label>
                            <div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" onclick="hideSection()" class="form-check-input" {{$users->conference_target_type == 'admin' ? "checked" : "" }} value="admin">
                                    <label class="form-check-label" for="customRadio1">Administrators</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" onclick="hideSection()" class="form-check-input" {{$users->conference_target_type == 'Teacher' ? "checked" : "" }} value="Teacher">
                                    <label class="form-check-label" for="customRadio1">Teacher</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" onclick="showSection()" class="form-check-input" {{$users->conference_target_type == 'student' ? "checked" : "" }} value="student">
                                    <label class="form-check-label" for="customRadio1">Students</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" onclick="showSection()" class="form-check-input" {{$users->conference_target_type == 'parent' ? "checked" : "" }} value="parent">
                                    <label class="form-check-label" for="customRadio1">parent</label>
                                </div>
                                <div class="form-group class_section {{$users->conference_target_type == 'parent' || $users->conference_target_type == 'student' ? 'd-block' : 'd-none' }} ">
                                    <label>Class</label>
                                    <select class="form-control" multiple name="class[]" id="class">
                                        <option value="0">not select</option>
                                        @foreach($classes as $class)
                                        <option @foreach($users->details('class') as $item)
                                            {{$item == $class->id ? "selected" : " "}}
                                            @endforeach

                                            value="{{$class->id}}">{{$class->className}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group class_section {{$users->conference_target_type == 'parent' || $users->conference_target_type == 'student' ? 'd-block' : 'd-none' }}">
                                    <label>Section</label>
                                    <select class="form-control" multiple name="section[]" id="getSection">
                                        <option value="0">not select</option>
                                        @foreach($getSection as $section)
                                        <option 
                                        @foreach($users->details('section') as $item)
                                            {{$item == $section->id ? "selected" : " "}}
                                            @endforeach

                                            value="{{$section->id}}">{{$section->sectionName}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 form-label">Scheduled Time</label>
                            <div>
                                <div class="form-check my-2">
                                    <input type="radio" name="time_date" onclick="hideTime()" class="form-check-input" checked="" value="now">
                                    <label class="form-check-label" for="customRadio1"> Start meeting now</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="time_date" onclick="showTime()" class="form-check-input"checked value="time">
                                    <label class="form-check-label" for="customRadio1"> Schedule meeting</label>
                                </div>
                            </div>
                            <div class="mb-3 " id="time">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input class="form-control " value="{{\Carbon\Carbon::parse($users->scheduled_date)->format('Y-m-d')}}" type="date" id="example-password-input1" name="date">
                                    </div>

                                    <div class="col-md-3">
                                        <input class="form-control " value="{{\Carbon\Carbon::parse($users->scheduled_date)->format('H:i')}}" type="time" id="example-password-input1" name="time">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-password-input1" class="form-label">Duration (Minutes)</label>
                                <div class="">
                                    <input class="form-control" type="number" value="{{$users->conference_duration}}" id="example-password-input1" name="mints" placeholder="Meeting Title">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Grade level</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

</div>
<div class="modal fade bs-example-modal-center show" id="models" tabindex="-1" aria-labelledby="mySmallModalLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="exampleModalLabel">Select users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="searchLink" placeholder=" / username /" onkeyup="myfilters(this.value)">
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger btn-flat  w-100">Search</button>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12" style="padding-top:10px;">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered">
                                <tbody id="setUsers">
                                    <!-- ngRepeat: studentOne in searchResults -->


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    // console.log(ss);
    // var xx = ss.replace(/&quot;/g," ")
    var xx = Array.from(ss.replace(/&quot;/g, "")).sort();
    // console.log(xx.length);

    // console.log(xx)
    for (var i = 0; i <= xx.length; i++) {
        // console.log(i)
        if (parseInt(xx[i]) > 0) {
            continue;
        } else {
            xx.splice(i, 1);
        }
    }
    // xx

    // console.log(Array.from(ss).sort());
    var arrOfSection = $('#class').val();
    // console.log($arrOfSection)
    function createInput(name, id) {
        
        $('#hostUser input[type="text"]').val(name);
        $('#hostUser input[type="number"]').val(id)
        $('#n_host').text(name);
    }

    function myfilters(text) {
        $.get("/admin/meeting/filter?filter[username]=" + text, function(data, status) {
            var allUser = ``;
            var users = data.data;
            for (var i = 0; i < users.length; i++) {
                allUser += ` <tr>
                                <td class="ng-binding" style="width: 35%;">${users[i].username}</td>
                                <td class="ng-binding" style="width: 35%;">${users[i].email}</td>
                                <td class="no-print" style="width: 30%;">
                                    <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal" onclick="createInput('${users[i].username}','${users[i].id}')">Select</button>
                                </td>
                            </tr>`;
            }
            document.getElementById('setUsers').innerHTML = allUser;
        });
    }

    function showSection() {
        $('.class_section').removeClass('d-none');
    }

    function hideSection() {
        $('.class_section').addClass('d-none');
    }

    function showTime() {
        $('#time').removeClass('d-none')
    }

    function hideTime() {
        $('#time').addClass('d-none')
    }
    var id = [];
    $('#class').change(function() {
        var getId = id.length;
        for (var i = 0; i <= getId; i++) {
            id = $('#class').val();
        }
        var crtona = ` <option value="0">not select</option>`;
        for (var x = 0; x <= getId; x++) {
            $.get("/admin/meeting/sections/" + id[x], function(data, status) {
                // console.log(id[x]);
                var allSction = data;
                for (var i = 0; i < allSction.length; i++) {
                    crtona += `<option value="${allSction[i].id}">${allSction[i].sectionName} - ${allSction[i].sectionTitle}</option>`
                }
                document.getElementById("getSection").innerHTML = crtona;
            });
        }

    });

    function getSection() {
        var crtona = ` <option value="0">not ssssselect</option>`;
        for (var x = 0; x <= arrOfSection.length; x++) {
            $.get("/admin/meeting/sections/" + arrOfSection[x], function(data, status) {
                // console.log(id[x]);
                var allSction = data;
                for (var i = 0; i < allSction.length; i++) {
                    crtona += `<option class="sections" value="${allSction[i].id}">${allSction[i].sectionName} - ${allSction[i].sectionTitle}
                     </option>`
                }
                document.getElementById("getSection").innerHTML = crtona;
            });
        }
     
    }
    getSection()

    // function arrs() {
    //     var options = document.getElementById('getSection').options;
    // for (let i = 0; i < options.length; i++) {
    //     console.log(options[i].value); //log the value
    // }
    // }
    // var sect = document.getElementById('getSection').options
    
    // var thisOptionValue;
    // $("#class option").each(function() {
    //      thisOptionValue = $(this).val();
    // });
    // console.log(thisOptionValue);
</script>
@endsection
@endsection