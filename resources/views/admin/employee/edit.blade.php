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
                <h4 class="mb-0 font-size-18">{{$newLang->employees}}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12" data-select2-id="9">
        <div class="card" data-select2-id="8">
            <div class="card-body" data-select2-id="7">
                @include('admin.inc.massage')

                <form method="post" action="{{url('/admin/employee/update')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <label class="form-label">{{$newLang->FullName}} *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" value="{{$user->fullName}}" name="fullName"  placeholder="{{$newLang->FullName}}">
                        </div>
                    </div>
                    <label class="form-label">{{$newLang->username}} *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" value="{{$user->username}}" name="username"  placeholder="{{$newLang->username}}">
                        </div>
                    </div><label class="form-label">{{$newLang->email}} *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="email" value="{{$user->email}}" placeholder="{{$newLang->email}}>
                        </div>
                    </div><label class="form-label">{{$newLang->password}} *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="password"  name="password" placeholder="Password">
                        </div>
                    </div>
                    <label class="form-label">{{$newLang->Gender}}</label>
                    <div class="mb-3 row p-3">
                        <div class="form-check my-2">
                            <input type="radio" id="customRadio1" {{$user->gender == 'male' ? "checked" : "" }} name="customRadio" class="form-check-input" value="male">
                            <label class="form-check-label" for="customRadio1">{{$newLang->Male}}</label>
                        </div>
                        <div class="form-check my-2">
                            <input type="radio" id="customRadio1" name="customRadio" {{$user->gender == 'fmale' ? "checked" : "" }} class="form-check-input" value="fmale">
                            <label class="form-check-label" for="customRadio1">{{$newLang->Female}}</label>
                        </div>
                    </div>
                    <label class="form-label">{{$newLang->birthday}}</label>
                    <div class="mb-0 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="date" value="{{$user->birthday}}" name="{{$newLang->birthday}}" id="example-date-input">
                        </div>
                    </div>
                    <label class="form-label mt-2">{{$newLang->Address}}</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" value="{{$user->address}}" type="text" name="address" id="subject2" placeholder="{{$newLang->Address}}">
                        </div>
                    </div>

                    <label class="form-label">{{$newLang->mobileNo}}</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="tel" value="{{$user->mobileNo}}" name="mobileNo" id="telephone" placeholder="Mobile No">
                        </div>
                    </div>

                    <label class="col-sm-2 form-label">{{$newLang->Permissions}}</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <select name="Permissions" class="form-select">
                                    <option></option>
                            @foreach($roles as $role)
                                     <option  {{$user->role_id == $role->id ? "selected" : " "}} value='{{$role->id}}'>{{$role->role_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <label class="col-sm-2 form-label">{{$newLang->depart}}</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <select class="form-select">
                                <option>{{$newLang->select." ".$newLang->depart}}</option>
                            </select>
                        </div>
                    </div>

                    <label class="col-sm-2 form-label">{{$newLang->desig}}</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <select class="form-select">
                                <option>{{$newLang->select." ".$newLang->desig}}</option>
                            </select>
                        </div>
                    </div>


                    <label class="col-sm-2 form-label" for="inputGroupFile01">{{$newLang->Upload}}</label>
                    <div class="input-group mb-3">
                         <input type="file" class="form-control" name="img" id="inputGroupFile01">
                    
                    <!-- <input type="file" name="img"> -->
                    </div>
                    <label class="col-md-3 my-2 control-label">{{$newLang->Communication}}</label>
                    <div class="col-md-9">
                        <div class="checkbox my-2">
                            <div class="form-check">
                                <input type="checkbox" name="communication[]" value="Mail" {{str_contains($user->comVia, 'Mail') ? "checked" : "" }}  class="form-check-input" id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="form-check-label" for="customCheck02">{{$newLang->mail}}</label>
                            </div>
                        </div>
                        <div class="checkbox my-2">
                            <div class="form-check">
                                <input type="checkbox" name="communication[]" value="SMS" {{str_contains($user->comVia, 'SMS') ? "checked" : "" }}   class="form-check-input"  id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="form-check-label" for="customCheck3">{{$newLang->sms}}</label>
                            </div>
                        </div>
                        <div class="checkbox my-2">
                            <div class="form-check">
                                <input type="checkbox" name="communication[]" {{str_contains($user->comVia, 'phone') ? "checked" : "" }}  value="phone" class="form-check-input"  id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="form-check-label" for="customCheckDisabled">{{$newLang->phone}}</label>
                                
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>
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