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
                <h4 class="mb-0 font-size-18">{{$newLang->parent}}</h4>
            </div>
        </div>
        <div class="row" id="flex">
            <div class="" id="card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0 font-size-18 mb-3">{{$newLang->AddParent}}</h4>
                        <div>
                            <form method="POST" action="{{url('admin/parent/submit')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->FullName}}</label>
                                        <div class="">
                                            <input class="form-control" type="text" value="" name="full_name" placeholder="{{$newLang->FullName}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->Gender}}</label>
                                        <div class="">
                                            <div class="col-sm-4 control-label mt-2">
                                                <div class="radio-list me-5" style="display: inline-block;">
                                                    <label>
                                                        <input type="radio" name="gender" value="male" checked="checked">
                                                        {{$newLang->Male}}
                                                    </label>
                                                </div>
                                                <div class="radio-list" style="display: inline-block;">
                                                    <label>
                                                        <input type="radio" name="gender" value="fmale">
                                                        {{$newLang->Female}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->email}}</label>
                                        <div class="">
                                            <input class="form-control" type="email" value="" name="email" placeholder="{{$newLang->email}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->Birthday}}</label>
                                        <div class="">
                                            <input class="form-control" type="date" name="birth_bay" id="example-date-input">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->Address}}</label>
                                        <div class="">
                                            <input class="form-control" type="text" value="" name="Address" placeholder="{{$newLang->Address}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->phoneNo}}</label>
                                        <div class="">
                                            <input class="form-control" type="tel" name="Phone_No" id="example-date-input" placeholder="{{$newLang->phoneNo}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->mobileNo}}</label>
                                        <div class="">
                                            <input class="form-control" type="tel" id="telephone" value="" name="mobile_no" placeholder="{{$newLang->mobileNo}}">
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->username}}</label>

                                        <div class="">
                                            <input class="form-control" type="text" value="" name="user_name" placeholder="{{$newLang->username}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->password}} </label>

                                        <div class="">
                                            <input class="form-control" type="Password" value="" name="Password" placeholder="{{$newLang->password}}">
                                        </div>
                                    </div>

                                    <div class=" col-md-6">
                                        <label for="example-email-input1" class="form-label pt-0">{{$newLang->Photo}}</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="img" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-3 my-2 control-label">{{$newLang->Communication}}</label>
                                        <div class="row">
                                            <div class="checkbox my-2 col-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="communication[]" value="Mail" checked class="form-check-input" id="customCheck02" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="form-check-label" for="customCheck02">{{$newLang->mail}}</label>
                                                </div>
                                            </div>
                                            <div class="checkbox my-2 col-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="communication[]" value="SMS" class="form-check-input" id="customCheck3" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="form-check-label" for="customCheck3">{{$newLang->sms}}</label>
                                                </div>
                                            </div>
                                            <div class="checkbox my-2 col-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="communication[]" value="phone" class="form-check-input" id="customCheck5" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="form-check-label" for="customCheckDisabled">{{$newLang->phone}}</label>

                                                </div>
                                            </div>
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

<script>

</script>

@endsection
@endsection