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
                <h4 class="mb-0 font-size-18">{{$newLang->takeAttendance}}</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <h5 class="card-title">{{$newLang->selectAttendance}}</h5>
                    <div class="text-center">
                        <h5>{{$newLang->class}} : {{$classe->className}}, {{$newLang->Date}} : {{$dates}}</h5>
                    </div>
                    <div>
                        <form class="form-horizontal" method="post" action="{{url('admin/attendance/click')}}">
                            @csrf
                            <input type="hidden" name="section" value="{{$clase}}">
                            <input type="hidden" name="date" value="{{$dates}}">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th class="ng-binding">{{$newLang->studentName}}</th>
                                        <th class="ng-binding">Attendance</th>
                                        <th class="ng-binding">{{$newLang->Notes}}</th>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px">#</td>
                                        <td>Select All</td>
                                        <td>
                                            <input type="button" onclick="btnAttendance('.absent')" class="btn btn-info btn-sm" value="{{$newLang->Absent}}">
                                            <input type="button" onclick="btnAttendance('.present')" class="btn btn-info btn-sm" value="{{$newLang->Present}}">
                                            <input type="button" onclick="btnAttendance('.late')" class="btn btn-info btn-sm" value="{{$newLang->Late}}">
                                            <input type="button" onclick="btnAttendance('.late_with_excuse')" class="btn btn-info btn-sm" value=" {{$newLang->LateExecuse}}">
                                            <input type="button" onclick="btnAttendance('.early_dismissal')" class="btn btn-info btn-sm" value="{{$newLang->earlyDismissal}}">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <!-- ngRepeat: student in students | object2Array -->
                                    @foreach($sections as $key => $section)
                                    <tr>
                                        <td></td>
                                        <td>
                                            <img alt="" class="user-image img-circle" style="width:35px; height:35px;" src="{{asset('uploads/')}}/{{$section->photo}}">
                                            <a>{{$section->fullName}}</a>
                                        </td>
                                        <td>
                                            <div>
                                                <div class="radio-list">
                                                    <label>
                                                        <input type="radio" class="absent" value="absent" name="attendance[{{$key}}]"> {{$newLang->Absent}}
                                                    </label>
                                                    <label>
                                                        <input type="radio" class="present" value="present" name="attendance[{{$key}}]"> {{$newLang->Present}}
                                                    </label>
                                                    <label>
                                                        <input type="radio" class="late" value="late" name="attendance[{{$key}}]"> {{$newLang->Late}}
                                                    </label>
                                                    <label>
                                                        <input type="radio" class="late_with_excuse" value="late_with_excuse" name="attendance[{{$key}}]"> {{$newLang->LateExecuse}}
                                                    </label>
                                                    <label>
                                                        <input type="radio" class="early_dismissal" value="early_dismissal" name="attendance[{{$key}}]">{{$newLang->earlyDismissal}}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="hidden" name="id[]" value="{{$section->id}}">
                                            <input type="text" name="attNotes[]"  class="form-control " placeholder={{$newLang->notes}}>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div class="form-group m-b-0">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light ">Save attendance</button>
                                </div>
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
<script src="{{asset('assets/js/main.js')}}"></script>



<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script>
// function btnAttendance(attendance){
//     console.log(attendance)
//     for(var i=0;i<$(attendance).length;i++) {
//         $(attendance)[i].checked = true
//     }
// }
</script>

@endsection
@endsection