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
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.inc.massage')
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h2 class="mb-0 font-size-18">Study Material</h2>

            </div>
        </div>

    </div>
    <div class="row">
    </div>
    <div class="row" id="flex">
        <div class="" id="card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>Add Material</h4>
                                    <form method="POST" action="{{url('admin/materials/edit')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <input type="hidden" name="subject_id" value="{{$oneRow->subject_id}}">

                                        <label for="example-text-input" class="col-sm-2  form-label">material title</label>
                                        <div class="mb-3 row">
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" name="material_title" value="{{$oneRow->material_title}}" placeholder="material title">
                                            </div>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 form-label">material description</label>
                                        <div class="mb-3 row">
                                            <div class="col-sm-12">
                                                <input class="form-control" type="text" value="{{$oneRow->material_description}}" name="material_description" placeholder="material description">
                                            </div>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 form-label">Material file</label>
                                        <div class="">
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="file" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                            </div>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 form-label">Week</label>
                                        <div class="mb-3 row">
                                            <div class="col-sm-12">
                                                <select class="form-select" name="week">
                                                    @foreach($weeks as $week)
                                                    <option {{$oneRow->week_id == $week->id ? "selected" : " "}} value="{{$week->id}}">{{$week->week}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label">Class</label>
                                            <div class="col-sm-12">
                                                <select class="form-select" name="Class" id="class">
                                                    @foreach($classes as $classe)
                                                    <option {{$oneRow->class_id == $classe->id ? "selected" : " "}} value="{{$classe->id}}">{{$classe->className}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label">Sections</label>
                                            <div class="col-sm-12">
                                                <select class="form-select" name="Sections" id="getSection">
                                                    @foreach($sections as $section)
                                                    <option {{$oneRow->section_id == $section->id ? "selected" : " "}} value="{{$section->id}}">{{$section->sectionName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <label for="example-text-input" class="col-sm-2 form-label">subject</label>
                                        <div class="mb-3 row">
                                            <div class="col-sm-12">
                                                <select class="form-select" name="teacher">
                                                    @foreach($teachers as $teacher)
                                                    <option {{$oneRow->user_id == $teacher->id ? "selected" : " "}} value="{{$teacher->id}}">{{$teacher->username}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-0">
                                                <button type="submit" class="btn btn-primary ">add material</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

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
<script src="{{asset('assets/libs/table-edits/build/table-edits.min.js')}}"></script>
<script src="{{asset('assets/js/pages/table-editable.init.js')}}"></script>


<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script>

</script>

@endsection
@endsection