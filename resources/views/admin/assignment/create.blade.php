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
    /* * {
        border: 1px solid #ddd;
    } */

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
                <h4 class="mb-0 font-size-18">Assignments</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">Add assignment</h5>
                    <div class="table-responsive">

                        <form method="post" action="{{url('admin/assignments/submit')}}" enctype="multipart/form-data">
                            @csrf
                            <label class="col-sm-2 text-right control-label col-form-label">Assignment title * </label>
                            <div class="form-group ">
                                <div class="col-sm-12">
                                    <input type="text" name="AssignTitle" class="form-control" placeholder="Assignment title">
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label ">Assignment Description</label>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea rows="10" name="AssignDescription" style="width: 100%;">
                                </textarea>
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label ">Assignment Deadline *</label>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="date" id="datemask" name="AssignDeadLine" class="form-control ">
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label ">Assignment File</label>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="file" id="inputGroupFile03">
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label ng-binding" >Class *</label>
                            <div class="form-group ">
                                <div class="col-sm-12">
                                    <select class="form-control " id="class" name="classId">
                                        <option>Not Select</option>

                                        @foreach($classes as $classe)
                                        <option value="{{$classe->id}}">{{$classe->className}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 text-right control-label col-form-label" >Section *</label>
                                <div class="col-sm-12">
                                    <select class="form-control" multiple id="getSection" name="section[]"> 
                                        <!-- ngRepeat: section in sections -->
                                    </select>
                                </div>
                            </div>
                            <label class="col-sm-2 text-right control-label col-form-label " >Subject *</label>
                            <div class="form-group row ">
                                <div class="col-sm-12">
                                    <select class="form-control" name="subject">
                                        <option>Not Select</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->subjectTitle}}</option>
                                        @endforeach
                                        <!-- ngRepeat: subjectOne in subject -->
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-0">

                                <button type="submit" class="btn btn-info waves-effect waves-light ">Add assignment</button>
                            </div>
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
    $('#class').change(function() {
        var id = $('#class').val(),
            crtona = ``;
        $.get("/admin/meeting/sections/" + id, function(data, status) {
            var allSction = data;
            for (var i = 0; i < allSction.length; i++) {
                crtona += `<option value="${allSction[i].id}">${allSction[i].sectionName} - ${allSction[i].sectionTitle}</option>`
            }
            document.getElementById("getSection").innerHTML = crtona;
        });
    });
</script>

@endsection
@endsection