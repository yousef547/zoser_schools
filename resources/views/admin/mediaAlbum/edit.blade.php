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


@endsection
@section('content')
<div class="container-fluid">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{$newLang->mediaCenter}}</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">{{$newLang->editAlbum}}</h5>
                    <form method="POST" action='{{url("admin/media/submit_edit/$media->id")}}' enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <label for="example-date-input" class="col-sm-2 form-label">{{$newLang->albumTitle}}</label>
                                <div class="mb-0 row">
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{$media->albumTitle}}"  name="title" id="example-date-input">
                                    </div>
                                </div>

                                <label for="example-date-input" class="mt-3 col-sm-2 form-label">{{$newLang->albumDesc}}
                                </label>
                                <div class="mb-0 row">
                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" value="{{$media->albumDescription}}"  name="description"  id="example-date-input">
                                    </div>
                                </div>

                                <label for="inputGroupFile03" class="mt-3 col-sm-2 form-label">{{$newLang->albumImage}}</label>
                                <div class="">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="image" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>
                            </div>
                        </div>
                    </form>
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