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
                <h4 class="mb-0 font-size-18">Attendance Report</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="">Report classification
                    </h5>
                    <div>
                        <div class="form">

                            <form method="POST" action="{{url('admin/attendance/report_details')}}">
                                @csrf
                                <div class="form-group row has-error" >
                                    <div class="col-sm-12">
                                        <label class="col-sm-2 text-right control-label col-form-label ng-binding">Class </label>
                                        <select class="form-control " name="classId" id="class">
                                            <option >not select</option>
                                            @foreach($classes as $classe)
                                            <option value="{{$classe->id}}">{{$classe->className}}</option>
                                            @endforeach
                                            <!-- ngRepeat: class in classes -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row has-error" >
                                    <div class="col-sm-12">
                                        <label class="col-sm-2 text-right control-label col-form-label ">Section name </label>
                                        <select class="form-control" name="sectionId" id="getSection">
                                            <option value="? undefined:undefined ?"></option>
                                            <!-- ngRepeat: section in sections -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row has-error" >
                                    <div class="col-sm-12">
                                        <label class="col-sm-2 text-right control-label col-form-label ">From </label>
                                        <input type="date"  name="attendanceDayFrom"  class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row has-error"  >
                                    <div class="col-sm-12">
                                        <label class="col-sm-2 text-right control-label col-form-label ">To </label>
                                        <input type="date"  name="attendanceDayTo"  class="form-control ">
                                    </div>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light ">Control attendance</button>
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
 $('#class').change(function() {
        var id = $('#class').val();
        console.log(id)
        
        var crtona = ` <option value="0">not select</option>`;
        $.get("/admin/meeting/sections/" + id, function(data, status) {
            console.log(data);
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