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
    .name_host {
        border: 1px solid #ccc;
        padding: 12px;
        font-size: 15px;
        border-radius: 4px;
        margin-top: 5px;
    }
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

    .fonts {
        font-size: 20px !important;
        font-weight: 600 !important;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Students</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="">Modals Examples</h5>
                    <div>
                        <form method="POST" action='{{url("admin/student/update/$student->id")}}' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Full Name</label>
                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->fullName}}" name="full_name" placeholder="full Name">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Gender</label>
                                    <div class="">
                                        <div class="col-sm-4 control-label mt-2">
                                            <div class="radio-list me-5" style="display: inline-block;">
                                                <label>
                                                    <input type="radio" name="gender" value="male" {{$student->gender == 'male' ? "checked" : "" }}>
                                                    Male
                                                </label>
                                            </div>
                                            <div class="radio-list" style="display: inline-block;">
                                                <label>
                                                    <input type="radio" name="gender" value="fmale" {{$student->gender == 'fmale' ? "checked" : "" }}>
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Email</label>
                                    <div class="">
                                        <input class="form-control" type="email" value="{{$student->email}}" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Birth Day</label>
                                    <div class="">
                                        <input class="form-control" type="date" value="{{$student->birthday}}" name="birth_bay" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Address</label>
                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->address}}" name="Address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Phone No</label>
                                    <div class="">
                                        <input class="form-control" type="tel" value="{{$student->phoneNo}}" name="Phone_No" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Mobile No</label>
                                    <div class="">
                                        <input class="form-control" type="tel" value="{{$student->mobileNo}}" id="telephone" value="" name="mobile_no" placeholder="Address">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Religion</label>

                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->religion}}" name="religion" placeholder="Address">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">User Name</label>

                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->username}}" name="user_name" placeholder="User Name">
                                    </div>
                                </div><hr/>
                                <!-- <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Password </label>

                                    <div class="">
                                        <input class="form-control" type="Password" value="" name="Password" placeholder="Password">
                                    </div>
                                </div> -->
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Class </label>
                                    <div class="">
                                        <select class="form-select" name="class" id="class">
                                            <option>select</option>
                                            @foreach($classes as $classe)

                                            <option {{$student->class_id  == $classe->id ? "selected" : "" }} value="{{$classe->id}}">{{$classe->className}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Section </label>
                                    <div class="">
                                        <select class="form-select" name="section" id="getSection">
                                            <option>select</option>
                                            @foreach($sections as $section)
                                            <option {{$student->section_id  == $section->id ? "selected" : "" }} value="{{$section->id}}">{{$section->sectionName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Photo</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="img" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Biometric ID </label>
                                    <div class="">
                                        <input class="form-control" type="number" value="{{$student->biometric_id}}" name="biometric_id" placeholder="Biometric ID">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Admission Number</label>
                                    <div class="">
                                        <input class="form-control" type="number" value="{{$student->admission_number}}" name="Admission_Number" placeholder="Admission Number">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Admission Date</label>
                                    <div class="">
                                        <input class="form-control" value="{{$student->admission_date}}" type="date" name="Admission_Date" id="example-date-input">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-md-3 my-2 control-label">Communication</label>
                                    <div class="row">
                                        <div class="checkbox my-2 col-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="communication[]" value="Mail" {{str_contains($student->comVia, 'Mail') ? "checked" : "" }}  class="form-check-input" id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="form-check-label" for="customCheck02">Mail</label>
                                            </div>
                                        </div>
                                        <div class="checkbox my-2 col-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="communication[]" value="SMS" {{str_contains($student->comVia, 'SMS') ? "checked" : "" }} class="form-check-input" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="form-check-label" for="customCheck3">SMS</label>
                                            </div>
                                        </div>
                                        <div class="checkbox my-2 col-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="communication[]" {{str_contains($student->comVia, 'phone') ? "checked" : "" }} value="phone" class="form-check-input" id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="form-check-label" for="customCheckDisabled">Phone</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-5">
                                    <h4 class="card-title ng-binding">Medical History</h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Insurance Policy </label>
                                            <div class="">
                                                <input type="text" name="medical[Policy]" value="{{$student->medical('Policy')}}" class="form-control " placeholder="Insurance Policy">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Blood Group </label>
                                            <div class="">
                                                <select class="form-control" name="medical[blood]">
                                                    <option value="">select</option>
                                                    @foreach($bloods as $blood)
                                                    <option {{$student->medical('blood')  == $blood ? "selected" : "" }}  value="{{$blood}}">{{$blood}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Weight </label>
                                            <div class="">
                                                <input type="text" name="medical[Weight]" class="form-control " value="{{$student->medical('Weight')}}" placeholder="Weight">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Height </label>
                                            <div class="">
                                                <input type="text" name="medical[Height]" class="form-control"  value="{{$student->medical('Height')}}" placeholder="Height">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Disability Type </label>
                                            <div class="">
                                                <input type="text" name="medical[Disability]" class="form-control " value="{{$student->medical('Disability')}}"  placeholder="Disability Type">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Contact Information </label>
                                            <div class="">
                                                <input type="text" name="medical[Contact]" class="form-control" value="{{$student->medical('Contact')}}"  placeholder="Contact Information">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-5">
                                    <h4 class="card-title ng-binding">Parent</h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Father Name </label>
                                            <div class="">
                                                <input type="text" name="father[Name]" class="form-control" value="{{$student->father('Name')}}" placeholder="Father Name">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Mother Name </label>
                                            <div class="">
                                                <input type="text" name="mother[Name]" class="form-control " value="{{$student->mother('Name')}}" placeholder="Mother Name">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Father Mobile </label>
                                            <div class="">
                                                <input type="text" name="father[mobile]" class="form-control " value="{{$student->father('mobile')}}" placeholder="Father Mobile">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Mother Mobile </label>
                                            <div class="">
                                                <input type="text" name="mother[mobile]" class="form-control " value="{{$student->mother('mobile')}}" placeholder="Mother Mobile">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Father Job </label>
                                            <div class="">
                                                <input type="text" name="father[Job]" class="form-control " value="{{$student->father('Job')}}" placeholder="Father Job">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Mother Job </label>
                                            <div class="">
                                                <input type="text" name="mother[Job]" class="form-control " value="{{$student->mother('Job')}}" placeholder="Mother Job">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Father Notes </label>
                                            <div class="">
                                                <input type="text" name="father[notes]" class="form-control " value="{{$student->father('notes')}}" placeholder="Father Notes">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">Mother Notes </label>
                                            <div class="">
                                                <input type="text" name="mother[notes]" class="form-control " value="{{$student->mother('notes')}}" placeholder="Mother Notes">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="example-password-input1" class="form-label">Meeting Host </label>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-center">search users</button>
                                    <div id="hostUser" class="">
                                        <p class="name_host" id="n_host">{{$parent->username}}</p>
                                        <input type="text" class="form-control mt-2" value="{{$parent->username}}" name="user_host" hidden>
                                        <input type="number" class="form-control mt-2" value="{{$parent->id}}" name="id_parent" hidden>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-lg">Add student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="searchLink" placeholder=" / Email /" onkeyup="myfilters(this.value)">
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
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>


<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/js/intlTelInput.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{asset('assets/js/intlTelInput-jquery.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<script>
    var input = document.querySelector("#telephone");
    window.intlTelInput(input, ({
        initialCountry: "auto",
        geoIpLookup: function(success, failure) {
            $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                success(countryCode);
            });
        },
        utilsScript: "js/utils.js"
    }));
    $("#telephone").intlTelInput();

    let telInput = $("#phone");


    $('#class').change(function() {
        var id = $('#class').val(),
            crtona = ``;
        $.get("/admin/meeting/sections/" + id, function(data, status) {
            var allSction = data;
            for (var i = 0; i < allSction.length; i++) {
                crtona += `<option value="${allSction[i].id}">${allSction[i].sectionName} - ${allSction[i].sectionTitle}</option>`
            }
            console.log(id);
            document.getElementById("getSection").innerHTML = crtona;
        });
    });
    function createInput(name, id) {
        $('#hostUser').removeClass('d-none')
        $('#hostUser input[type="text"]').val(name);
        $('#hostUser input[type="number"]').val(id)
        $('#n_host').text(name);
    }

    function myfilters(text) {
        $.get("/admin/student/filter?filter[email]=" + text, function(data, status) {
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
</script>

@endsection
@endsection