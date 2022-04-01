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
                <h4 class="mb-0 font-size-18">{{$newLang->Sec}}</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">{{$newLang->editSection}}</h5>
                    <div class="table-responsive">

                        <form method="POST" action='{{url("admin/section/editSection/$section->id")}}'>
                            @csrf
                            <label class="col-sm-2 text-right control-label col-form-label ng-binding">{{$newLang->section}} * </label>
                            <div class="form-group ">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="{{$section->sectionName}}" name="sectionName" placeholder="{{$newLang->section}} ">
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label ng-binding">{{$newLang->sectionTitle}} * </label>
                            <div class="form-group ">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="{{$section->sectionTitle}}" name="sectionTitle" placeholder="{{$newLang->sectionTitle}} ">
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label">{{$newLang->class}} *</label>
                            <div class="form-group ">
                                <div class="col-sm-12">
                                    <select class="form-control" name="classes" >
                                        <option>{{$newLang->select.' '.$newLang->class}}</option>
                                        @foreach($classes as $classe)
                                        <option {{$section->classe_id == $classe->id ? "selected" : " "}} value="{{$classe->id}}">{{$classe->className}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label"> {{$newLang->teacher}} *</label>
                            <div class="form-group ">
                                <div class="col-sm-12">
                                    <select class="form-control" name="sectionTeacher[]" multiple="">
                                        @foreach($teachers as $teacher)
                                        <option
                                        @foreach(json_decode($section->sectionTeacher) as $item)
                                        {{$item == $teacher->id ? "selected" : " "}}
                                        @endforeach
                                        
                                        value="{{$teacher->id}}">{{$teacher->username}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                          
                            <!-- <label class="col-sm-2 text-right control-label col-form-label ">Class dormitory</label>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <select class="form-control ">
                                        <option value="? undefined:undefined ?"></option>
                                        ngRepeat: dormitoryOne in dormitory 
                                    </select>
                                </div>
                            </div> -->

                            <button type="submit" class="btn btn-info waves-effect waves-light " >{{$newLang->editSection}}</button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- end card -->
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
    $('#texts').text().replace(" ", "55")
</script>

@endsection
@endsection