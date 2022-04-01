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
                <h4 class="mb-0 font-size-18">{{$newLang->editStudent}}</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <form method="POST" action='{{url("admin/student/update/$student->id")}}' enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->FullName}}</label>
                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->fullName}}" name="full_name" placeholder="{{$newLang->FullName}}">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->Gender}}</label>
                                    <div class="">
                                        <div class="col-sm-4 control-label mt-2">
                                            <div class="radio-list me-5" style="display: inline-block;">
                                                <label>
                                                    <input type="radio" name="gender" value="male" {{$student->gender == 'male' ? "checked" : "" }}>
                                                    {{$newLang->Male}}
                                                </label>
                                            </div>
                                            <div class="radio-list" style="display: inline-block;">
                                                <label>
                                                    <input type="radio" name="gender" value="fmale" {{$student->gender == 'fmale' ? "checked" : "" }}>
                                                    {{$newLang->Female}}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->email}}</label>
                                    <div class="">
                                        <input class="form-control" type="email" value="{{$student->email}}" name="email" placeholder="{{$newLang->email}}">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->birthday}}</label>
                                    <div class="">
                                        <input class="form-control" type="date" value="{{$student->birthday}}" name="birth_bay" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->Address}}</label>
                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->address}}" name="Address" placeholder="{{$newLang->Address}}">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->phoneNo}}</label>
                                    <div class="">
                                        <input class="form-control" type="tel" value="{{$student->phoneNo}}" name="Phone_No" id="example-date-input">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->mobileNo}}</label>
                                    <div class="">
                                        <input class="form-control" type="tel" value="{{$student->mobileNo}}" id="telephone" value="" name="mobile_no" placeholder="Address">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->religion}}</label>

                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->religion}}" name="religion" placeholder="{{$newLang->religion}}">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->username}}</label>

                                    <div class="">
                                        <input class="form-control" type="text" value="{{$student->username}}" name="user_name" placeholder="{{$newLang->username}}">
                                    </div>
                                </div><hr/>
                                <!-- <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">Password </label>

                                    <div class="">
                                        <input class="form-control" type="Password" value="" name="Password" placeholder="Password">
                                    </div>
                                </div> -->
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->class}} </label>
                                    <div class="">
                                        <select class="form-select" name="class" id="class">
                                            <option>{{$newLang->select." ". $newLang->class}} </option>
                                            @foreach($classes as $classe)

                                            <option {{$student->class_id  == $classe->id ? "selected" : "" }} value="{{$classe->id}}">{{$classe->className}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->section}}</label>
                                    <div class="">
                                        <select class="form-select" name="section" id="getSection">
                                            <option>{{$newLang->select." ". $newLang->section}}</option>
                                            @foreach($sections as $section)
                                            <option {{$student->section_id  == $section->id ? "selected" : "" }} value="{{$section->id}}">{{$section->sectionName}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->Photo}}</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="img" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->bioId}} </label>
                                    <div class="">
                                        <input class="form-control" type="number" value="{{$student->biometric_id}}" name="biometric_id" placeholder="{{$newLang->bioId}} ">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->admNumber}}</label>
                                    <div class="">
                                        <input class="form-control" type="number" value="{{$student->admission_number}}" name="Admission_Number" placeholder="{{$newLang->admNumber}}">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="example-email-input1" class="form-label pt-0">{{$newLang->admDate}}</label>
                                    <div class="">
                                        <input class="form-control" value="{{$student->admission_date}}" type="date" name="Admission_Date" id="example-date-input">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-md-3 my-2 control-label">{{$newLang->Communication}}</label>
                                    <div class="row">
                                        <div class="checkbox my-2 col-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="communication[]" value="Mail" {{str_contains($student->comVia, 'Mail') ? "checked" : "" }}  class="form-check-input" id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="form-check-label" for="customCheck02">{{$newLang->mail}}</label>
                                            </div>
                                        </div>
                                        <div class="checkbox my-2 col-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="communication[]" value="SMS" {{str_contains($student->comVia, 'SMS') ? "checked" : "" }} class="form-check-input" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="form-check-label" for="customCheck3">{{$newLang->sms}}</label>
                                            </div>
                                        </div>
                                        <div class="checkbox my-2 col-4">
                                            <div class="form-check">
                                                <input type="checkbox" name="communication[]" {{str_contains($student->comVia, 'phone') ? "checked" : "" }} value="phone" class="form-check-input" id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="form-check-label" for="customCheckDisabled">{{$newLang->phone}}</label>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-5">
                                    <h4 class="card-title ng-binding">{{$newLang->medHistory}}</h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->insPolicy}} </label>
                                            <div class="">
                                                <input type="text" name="medical[Policy]" value="{{$student->medical('Policy')}}" class="form-control " placeholder="{{$newLang->insPolicy}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->bloodGroup}}</label>
                                            <div class="">
                                                <select class="form-control" name="medical[blood]">
                                                    <option value="">{{$newLang->select ." ".$newLang->bloodGroup}}</option>
                                                    @foreach($bloods as $blood)
                                                    <option {{$student->medical('blood')  == $blood ? "selected" : "" }}  value="{{$blood}}">{{$blood}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->Weight}} </label>
                                            <div class="">
                                                <input type="text" name="medical[Weight]" class="form-control " value="{{$student->medical('Weight')}}" placeholder="{{$newLang->Weight}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->height}} </label>
                                            <div class="">
                                                <input type="text" name="medical[Height]" class="form-control"  value="{{$student->medical('Height')}}" placeholder="{{$newLang->height}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->disType}} </label>
                                            <div class="">
                                                <input type="text" name="medical[Disability]" class="form-control " value="{{$student->medical('Disability')}}"  placeholder="{{$newLang->disType}}">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->contactInfo}} </label>
                                            <div class="">
                                                <input type="text" name="medical[Contact]" class="form-control" value="{{$student->medical('Contact')}}"  placeholder="{{$newLang->contactInfo}} ">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-5">
                                    <h4 class="card-title ng-binding">{{$newLang->parent}}</h4>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->fatheName}} </label>
                                            <div class="">
                                                <input type="text" name="father[Name]" class="form-control" value="{{$student->father('Name')}}" placeholder="{{$newLang->fatheName}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->motherName}} </label>
                                            <div class="">
                                                <input type="text" name="mother[Name]" class="form-control " value="{{$student->mother('Name')}}" placeholder="{{$newLang->motherName}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->fatherMob}}</label>
                                            <div class="">
                                                <input type="text" name="father[mobile]" class="form-control " value="{{$student->father('mobile')}}" placeholder="{{$newLang->fatherMob}}<">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->motherMob}}< </label>
                                            <div class="">
                                                <input type="text" name="mother[mobile]" class="form-control " value="{{$student->mother('mobile')}}" placeholder="{{$newLang->motherMob}}">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->fatherJob}} </label>
                                            <div class="">
                                                <input type="text" name="father[Job]" class="form-control " value="{{$student->father('Job')}}" placeholder="{{$newLang->fatherJob}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->motherJob}} </label>
                                            <div class="">
                                                <input type="text" name="mother[Job]" class="form-control " value="{{$student->mother('Job')}}" placeholder="{{$newLang->motherJob}} ">
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->fatherNotes}} </label>
                                            <div class="">
                                                <input type="text" name="father[notes]" class="form-control " value="{{$student->father('notes')}}" placeholder="{{$newLang->fatherNotes}}">
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label pt-0">{{$newLang->motherNotes}} </label>
                                            <div class="">
                                                <input type="text" name="mother[notes]" class="form-control " value="{{$student->mother('notes')}}" placeholder="{{$newLang->motherNotes}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="example-password-input1" class="form-label">{{$newLang->hoster}} </label>
                                    <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-center">{{$newLang->Search}}</button>
                                    <div id="hostUser" class="">
                                        <p class="name_host" id="n_host">{{$parent->username}}</p>
                                        <input type="text" class="form-control mt-2" value="{{$parent->username}}" name="user_host" hidden>
                                        <input type="number" class="form-control mt-2" value="{{$parent->id}}" name="id_parent" hidden>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-lg">{{$newLang->submit}}</button>
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