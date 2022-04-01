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
    .setting .canActive {
        border-bottom: 1px solid #e9ecef !important;
        border-top: 1px solid #e9ecef !important;
        padding: 10px;
        cursor: pointer;
    }

    .actives {
        background: #009efb;
        border-color: #009efb;
        color: #fff;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.inc.massage')
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{$newLang->AccountSettings}}</h4>
            </div>
        </div>
    </div>
    <div class="row" id="flex">
        <div class="col-md-3" id='close'>
            <div class="card setting">
                <ul class="list-unstyled my-3 mx-3 border border-light border-2 rounded">
                    <li class="actives canActive" data-setting="invoices">{{$newLang->myInvoices}}</li>
                    <li class="canActive" data-setting="change_profile">{{$newLang->ChgProfileData}}</li>
                    <li class="canActive" data-setting="change_email">{{$newLang->chgEmailAddress}}</li>
                    <li class="canActive" data-setting="change_password">{{$newLang->chgPassword}}</li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 allsetting" id="invoices">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$newLang->myInvoices}}</h5>
                    <div>
                    {{$newLang->myInvoices}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 d-none allsetting" id="change_profile">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$newLang->ChgProfileData}}</h5>
                    <div>
                        <form method="POST" action="{{url('/admin/settings/profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="form-label pt-0">{{$newLang->FullName}} </label>
                                <div class="">
                                    <input class="form-control" type="text" name="fullName" value="{{$user->fullName}}" id="example-email-input1" placeholder="{{$newLang->FullName}}">
                                </div>
                            </div>
                            <div class="form-check my-2">
                                <input type="radio" id="customRadio1" {{$user->gender == 'male' ? "checked" : "" }} name="gender" value="male" class="form-check-input" checked="">
                                <label class="form-check-label" for="customRadio1">{{$newLang->Male}}</label>
                            </div>
                            <div class="form-check my-2">
                                <input type="radio" id="customRadio1" {{$user->gender == 'fmale' ? "checked" : "" }} name="gender" value="fmale" class="form-check-input">
                                <label class="form-check-label" for="customRadio1">{{$newLang->Female}}</label>
                            </div>
                            <div class="mb-0 row">
                                <label for="example-date-input" class="col-sm-2 form-label">{{$newLang->Birthday}}</label>
                                <div class="col-sm-12">
                                    <input class="form-control" type="date" name="birthday" placeholder="{{$newLang->Birthday}}" value="{{$user->birthday}}" id="example-date-input">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="col-sm-2 form-label">{{$newLang->Address}}</label>
                                <div class="">
                                    <input class="form-control" type="text" value="{{$user->address}}" name="address" id="example-email-input1" placeholder="{{$newLang->Address}}">
                                </div>
                            </div>

                            <div class="mb-3 ">
                                <label for="example-email-input1" class="col-sm-2 form-label">{{$newLang->zoomLink}}</label>
                                <div class="">
                                    <input class="form-control" type="text" value="{{$user->zoomLink}}" name="zoomLink" id="example-email-input1" placeholder="{{$newLang->zoomLink}}">
                                </div>
                            </div>


                            <label class="form-label">{{$newLang->phoneNo}}</label>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="tel" name="phoneNo" value="{{$user->phoneNo}}" placeholder="{{$newLang->phoneNo}}">
                                </div>
                            </div>

                            <label class="form-label">{{$newLang->mobileNo}}</label>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <input class="form-control" type="tel" name="mobileNo" id="telephone" value="{{$user->mobileNo}}" placeholder="{{$newLang->mobileNo}}">
                                </div>
                            </div>
                            <label class="col-md-3 my-2 control-label">{{$newLang->Communication}}</label>
                            <div class="col-md-9">
                                <div class="checkbox my-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="comVia[]" value="Mail" class="form-check-input" {{str_contains($user->comVia, 'Mail') ? "checked" : "" }} id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="form-check-label" for="customCheck02">{{$newLang->mail}}</label>
                                    </div>
                                </div>
                                <div class="checkbox my-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="comVia[]" value="SMS" class="form-check-input" {{str_contains($user->comVia, 'SMS') ? "checked" : "" }} id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="form-check-label" for="customCheck3">{{$newLang->sms}}</label>
                                    </div>
                                </div>
                                <div class="checkbox my-2">
                                    <div class="form-check">
                                        <input type="checkbox" name="comVia[]" value="phone" class="form-check-input" {{str_contains($user->comVia, 'phone') ? "checked" : "" }} id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="form-check-label" for="customCheckDisabled">{{$newLang->Photo}}</label>

                                    </div>
                                </div>
                            </div>
                            <label class="col-sm-2 form-label" for="inputGroupFile01">{{$newLang->Upload}}</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="photo" id="inputGroupFile01">

                            </div>
                            <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 d-none allsetting" id="change_email">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$newLang->chgEmailAddress}}</h5>
                    <div>
                        <form method="POST" action="{{url('admin/settings/email')}}">
                            @csrf
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="form-label pt-0">{{$newLang->password}} </label>
                                <div class="">
                                    <input class="form-control" type="password" name="password" value="" id="example-email-input1" placeholder="password">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="form-label pt-0">{{$newLang->email}} </label>
                                <div class="">
                                    <input class="form-control" type="email" name="email" value="{{$user->email}}" id="example-email-input1" placeholder="{{$newLang->email}}">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="form-label pt-0">{{$newLang->reemail}} </label>
                                <div class="">
                                    <input class="form-control" type="email" name="retype_email" value="" id="example-email-input1" placeholder="Retype Email address">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 d-none allsetting" id="change_password">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$newLang->chgPassword}}</h5>
                    <div>
                    <div>
                        <form method="POST" action="{{url('admin/settings/password')}}">
                            @csrf
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="form-label pt-0">{{$newLang->oldPassword}} </label>
                                <div class="">
                                    <input class="form-control" type="password" name="oldPassword" value="" id="example-email-input1" placeholder="{{$newLang->oldPassword}}">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="form-label pt-0">{{$newLang->newPassword}} </label>
                                <div class="">
                                    <input class="form-control" type="Password" name="password" value="" id="example-email-input1" placeholder="{{$newLang->newPassword}}">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-email-input1" class="form-label pt-0">{{$newLang->renewPassword}} </label>
                                <div class="">
                                    <input class="form-control" type="Password" name="password_confirmation" value="" id="example-email-input1" placeholder="{{$newLang->renewPassword}}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>

                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<script src="{{asset('assets/js/intlTelInput.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{asset('assets/js/intlTelInput-jquery.min.js')}}"></script>
<script>
    var localPage = localStorage.getItem("page")
    $('.allsetting').addClass('d-none')
    $('#' + localPage).removeClass('d-none');
    $('.canActive').removeClass('actives');
    var arr = $('.canActive');
    for (var i = 0; i < arr.length; i++) {
        if (arr[i].getAttribute('data-setting') == localPage) {
            arr[i].classList.add("actives")
        }
    }
    // console.log()

    $('ul .canActive').click(function() {
        $(this).addClass('actives').siblings().removeClass('actives');
        $('.allsetting').addClass('d-none')
        var setting = $(this).attr('data-setting');
        $('#' + setting).removeClass('d-none');
        localStorage.setItem("page", setting);
    })


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