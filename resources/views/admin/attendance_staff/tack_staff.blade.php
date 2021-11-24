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
                <h4 class="mb-0 font-size-18">Take Attendance</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title mb-5">Select attendance info to add</h5>

                    <div class="card-block">
                        <h4 class="card-title ng-binding">Staff Attendance - Date : {{$date}}</h4>
                        <div class="form">

                            <form class="form-horizontal" method="post" action="{{url('admin/attendance/staff_submit')}}">
                                @csrf
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th class="ng-binding">Teacher</th>
                                            <th class="ng-binding">Attendance</th>
                                            <th class="ng-binding">Notes</th>
                                        </tr>
                                        <tr>
                                            <td>Select All</td>
                                            <td>
                                                <input type="button" onclick="btnAttendance('.present'); showTimeB()" class="btn btn-info btn-sm" value="Present">
                                                <input type="button" onclick="btnAttendance('.absent'); hideTimeB()" class="btn btn-info btn-sm" value="Absent">
                                                <input type="button" onclick="btnAttendance('.late'); showTimeB()" class="btn btn-info btn-sm" value="Late">
                                                <input type="button" onclick="btnAttendance('.late_with_excuse'); showTimeB()" class="btn btn-info btn-sm" value="Late with excuse">
                                            </td>
                                            <td></td>
                                        </tr>
                                        @foreach($staffs as $key => $staff)
                                        <tr>
                                            <td class="">{{$staff->fullName}}</td>
                                            <td>
                                                <div>
                                                    @if($type == "in")
                                                    <div class="radio-list">
                                                        <label>
                                                            <input type="radio" onclick="showTime('{{$key}}')" value="present" class="present" name="staff[{{$key}}]"> Present
                                                        </label>
                                                        <label>
                                                            <input type="radio" onclick="hideTime('{{$key}}')" value="absent" class="absent" name="staff[{{$key}}]"> Absent
                                                        </label>
                                                        <label>
                                                            <input type="radio" onclick="showTime('{{$key}}')" value="late" class="late" name="staff[{{$key}}]"> Late
                                                        </label>
                                                        <label>
                                                            <input type="radio" onclick="showTime('{{$key}}')" value="late_with_excuse" class="late_with_excuse" name="staff[{{$key}}]"> Late with excuse
                                                        </label>
                                                    </div>
                                                    @endif
                                                    <div class="radio-lists{{$key}} d-none all" style="padding-top: 10px;">
                                                        <div class="row">
                                                            <div class="col-sm-3 control-label col-form-label ">

                                                                Not checked in
                                                            </div>

                                                            <div class="col-sm-9">
                                                                <h6>Check {{$type}}</h6>
                                                                <input class="form-control" type="time" name="time[]" id="example-time-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="hidden" name="typee" value="{{$type}}">
                                                <input type="hidden" name="date" value="{{$date}}">
                                                <input type="hidden" name="allId[]" value="{{$staff->id}}">
                                                <input type="text" name="attNotes[]" class="form-control" placeholder="Notes">
                                            </td>
                                        </tr><!-- end ngRepeat: teacher in teachers | object2Array -->

                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light m-t-10 ng-binding">Save attendance</button>
                                    </div>
                                </div>
                            </form>

                        </div>
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
<script src="{{asset('assets/js/main.js')}}"></script>



<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script>

</script>

@endsection
@endsection