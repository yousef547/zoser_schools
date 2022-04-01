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
    <div class="col-md-12">
        <h5 class="card-title">{{$newLang->newsboard}}</h5>
        <div class="card">
            <div class="card-body">
                <div class="row my-2">
                    <h5 class="card-title col-md-6 mb-3">{{$newLang->addNews}}</h5>
                    <div class="col-lg-12">

                        <form method="post" action="{{route('board.submit')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <label class="form-label pt-0">{{$newLang->newsTitle}}</label>
                                    <input class="form-control" type="text" name="newsTitle" placeholder="{{$newLang->newsTitle}}">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="mb-3">
                                <label class="form-label pt-0">{{$newLang->newsContent}}</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="newsText" rows="4" placeholder="{{$newLang->newsContent}}"></textarea>
                            </div>
                            <div class="mb-3 row">
                                <label class="form-label">{{$newLang->for}}</label>
                                <div class="col-sm-12">
                                    <select class="form-select" name="newsFor">
                                        <option>{{$newLang->select}}</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="example-date-input" class="form-label">{{$newLang->Date}}</label>
                                <div class="col-sm-12">
                                    <input class="form-control" name="newsDate" type="date" id="example-date-input">
                                </div>
                            </div>
                            <div class="">
                                <label for="example-date-input" class="form-label">{{$newLang->Photo}}</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" name="newsImage" aria-label="Upload">
                                </div>
                            </div>
                            <span>
                                {{$newLang->visibleCMS}}
                            </span>
                            <div class="form-check my-2">
                                <input type="radio" id="customRadio1" name="fe_active" value="1" class="form-check-input" >
                                <label class="form-check-label" for="customRadio1">{{$newLang->Active}}</label>
                            </div>

                            <div class="form-check my-2">
                                <input type="radio" id="customRadio2" name="fe_active" value="0" class="form-check-input" >
                                <label class="form-check-labe2" for="customRadio1">{{$newLang->Inactive}}</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>
                        </form>
                        <!-- end card -->
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