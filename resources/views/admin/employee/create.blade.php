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
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Teacher</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12" data-select2-id="9">
        <div class="card" data-select2-id="8">
            <div class="card-body" data-select2-id="7">
                @include('admin.inc.massage')

                <form method="post" action="{{url('/admin/employee/store')}}" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label">Full Name *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="fullName"  placeholder="Full Name">
                        </div>
                    </div>
                    <label class="form-label">Username *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="username"  placeholder="Username">
                        </div>
                    </div><label class="form-label">Email address *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="email"  placeholder="Email address">
                        </div>
                    </div><label class="form-label">Password *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <label class="form-label">Gender</label>
                    <div class="mb-3 row p-3">
                        <div class="form-check my-2">
                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" value="male">
                            <label class="form-check-label" for="customRadio1">Male</label>
                        </div>
                        <div class="form-check my-2">
                            <input type="radio" id="customRadio1" name="customRadio" class="form-check-input" value="fmale">
                            <label class="form-check-label" for="customRadio1">Female</label>
                        </div>
                    </div>
                    <label class="form-label">Bairth day</label>
                    <div class="mb-0 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="date" name="birthday" id="example-date-input">
                        </div>
                    </div>
                    <label class="form-label mt-2">Address</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="address" id="subject2" placeholder="Address">
                        </div>
                    </div>

                    <label class="form-label">Mobile No</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="tel" name="mobileNo" id="telephone" placeholder="Mobile No">
                        </div>
                    </div>

                    <label class="col-sm-2 form-label">Permissions</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <select name="Permissions" class="form-select">
                                    <option></option>
                            @foreach($roles as $role)
                                     <option value='{{$role->id}}'>{{$role->role_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <label class="col-sm-2 form-label">Departments</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <select class="form-select">
                                <option>Not Select</option>
                            </select>
                        </div>
                    </div>

                    <label class="col-sm-2 form-label">Designations</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <select class="form-select">
                                <option>Not Select</option>
                            </select>
                        </div>
                    </div>


                    <label class="col-sm-2 form-label" for="inputGroupFile01">Upload</label>
                    <div class="input-group mb-3">
                         <input type="file" class="form-control" name="img" id="inputGroupFile01">
                    
                    <!-- <input type="file" name="img"> -->
                    </div>
                    <label class="col-md-3 my-2 control-label">Communication</label>
                    <div class="col-md-9">
                        <div class="checkbox my-2">
                            <div class="form-check">
                                <input type="checkbox" name="communication[]" value="Mail" checked class="form-check-input" id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="form-check-label" for="customCheck02">Mail</label>
                            </div>
                        </div>
                        <div class="checkbox my-2">
                            <div class="form-check">
                                <input type="checkbox" name="communication[]" value="SMS"  class="form-check-input" checked="" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="form-check-label" for="customCheck3">SMS</label>
                            </div>
                        </div>
                        <div class="checkbox my-2">
                            <div class="form-check">
                                <input type="checkbox" name="communication[]" value="phone" class="form-check-input" checked="" id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="form-check-label" for="customCheckDisabled">Phone</label>
                                
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-lg mt-2">submit</button>
                </form>
            </div>
        </div>
        <!-- end card -->
    </div>
</div>

<!-- <input type="tel" id="telephone"> -->




@section('script')
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

    let telInput = $("#phone")



    
</script>



@endsection
@endsection