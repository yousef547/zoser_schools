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
<link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.2.620/styles/kendo.bootstrap-v4.min.css">

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

    .table>:not(caption)>*>* {
        padding: 5px 0.75rem !important;
    }

    .dropdown-toggle::after {
        display: inline-block;
        margin-left: 0.255 em;
        vertical-align: 0.255 em;
        content: "";
        border-top: 0.3 em solid;
        border-right: 0.3 em solid transparent;
        border-bottom: 0;
        border-left: 0.3 em solid transparent;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <h5>Classes Schedule</h5>
    @include('admin.inc.massage')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="card-title">{{$newLang->classSch." : ".$newLang->className." ".$section->classe->classNam." ".$newLang->section." ".$section->sectionTitle}}</h5>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="font-size: 20px; font-weight: 600; width:10%">{{$newLang->day}}</th>
                                                <th scope="col" style="font-size: 20px; font-weight: 600; width:80%">{{$newLang->ClassSchedule}}</th>
                                                <th scope="col" style="font-size: 20px; font-weight: 600; width:10%">{{$newLang->addSch}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($days as $day)
                                            <tr>
                                                <td>
                                                    @switch($day->day)
                                                    @case("Sunday")
                                                    {{$newLang->Sunday}}
                                                    @break
                                                    @case("Monday")
                                                    {{$newLang->Monday}}
                                                    @break
                                                    @case("Tuesday")
                                                    {{$newLang->Tuesday}}
                                                    @break
                                                    @case("Wednesday")
                                                    {{$newLang->Wednesday}}
                                                    @break
                                                    @case("Thursday")
                                                    {{$newLang->Thurusday}}
                                                    @break
                                                    @case("Friday")
                                                    {{$newLang->Friday}}
                                                    @break
                                                    @case("Saturday")
                                                    {{$newLang->Saturday}}
                                                    @break
                                                    @endswitch
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        @foreach($schedules as $schedule)
                                                        @if($schedule->section_id == $id)
                                                        @if($day->id == $schedule->day_id)
                                                        <div class="col-md-3 px-3">
                                                            <div>
                                                                <div class="row bg-primary fs-6 fw-bold text-white rounded-pill">
                                                                    <div class="col-md-5 pt-2">
                                                                        <span>{{$schedule->subjectTitle}}</span>
                                                                        <br>
                                                                        <span>{{$schedule->username}}</span>
                                                                    </div>
                                                                    <div class="col-md-5 text-center">
                                                                        <span>{{$schedule->startTime}}</span>
                                                                        <br>
                                                                        {{$newLang->to}}
                                                                        <br>
                                                                        <span>{{$schedule->endTime}}</span>
                                                                    </div>
                                                                    <div class="col-md-2 pt-3">
                                                                        @can("classSch_setting" )
                                                                        <div class="btn-group" role="group">
                                                                            <button id="btnGroupDrop1" type="button" class="bg-transparent border-0" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="fas fa-ellipsis-v fa-2 text-white"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                                @can("classSch_editSch" )
                                                                                <li><a class="dropdown-item" data-bs-toggle="modal" onclick='getSchedule("{{$section->classe->id}}","{{$section->id}}","{{$day->id}}","{{$schedule->subjectTitle}}","{{$schedule->user_id}}","{{$schedule->startTime}}","{{$schedule->endTime}}","{{$schedule->id}}")' data-bs-target="#exampleModal">{{$newLang->Edit}}</a></li>
                                                                                @endcan
                                                                                @can("classSch_delSch" )

                                                                                <li><a class="dropdown-item" data-bs-toggle="modal" onclick='removeClass("{{$schedule->subjectTitle}}","{{$schedule->id}}")' data-bs-target="#exampleModalRemove">{{$newLang->Remove}}</a></li>
                                                                                @endcan
                                                                            </ul>
                                                                        </div>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        @endforeach

                                                    </div>
                                                </td>
                                                <td>
                                                    @can("classSch_addSch" )
                                                    <a onclick='getDay("{{$day->id}}")' class="btn btn-info btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModalform"><i class="fa fa-fw fa-plus"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

</div>
<div class="modal fade show" id="exampleModalform" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{url('admin/class_schedulr/submit')}}">
                    @csrf
                    <input type="hidden" name="class_id" value="{{$section->classe->id}}">
                    <input type="hidden" name="section_id" value="{{$section->id}}">
                    <input type="hidden" name="day_id" id="day">
                    <div class="mb-3 row">
                        <label class="col-sm-2 form-label">{{$newLang->subjectName}}</label>
                        <div class="col-sm-12">
                            <select name="subject_id" class="form-select">
                                <option selected="">{{$newLang->select." ".$newLang->Subject}}</option>
                                @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subjectTitle}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 form-label">{{$newLang->teacher}}</label>
                        <div class="col-sm-12">
                            <select name="user_id" class="form-select">
                                <option selected="">{{$newLang->select." ".$newLang->teacher}}</option>
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md-form">
                        <label class="my-2" for="input_starttime">{{$newLang->startTime}}</label>
                        <input placeholder="Selected time" type="time" id="timePicker" name="startTime" class="form-control timepicker">
                    </div>
                    <div class="md-form">
                        <label class="my-2" for="input_starttime">{{$newLang->endTime}}</label>
                        <input placeholder="Selected time" type="time" name="endTime" id="timePicker2" class="form-control timepicker">
                    </div>
                    <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalRemove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="get" action="{{url('admin/class_schedulr/delete')}}">
                @csrf
                <input type="hidden" name="id" id="itemId">
                <div class="modal-body">
                    <p>{{$newLang->delSubject}} <span id="removeSubject"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{$newLang->close}}</button>
                    <button type="submit" class="btn btn-primary">{{$newLang->Remove}}</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{url('admin/class_schedulr/update')}}">
                    @csrf
                    <input type="hidden" name="idsubject" id="ids">
                    <input type="hidden" name="class_id" id="classe">
                    <input type="hidden" name="section_id" id="section">
                    <input type="hidden" name="day_id" id="dayId">
                    <div class="mb-3 row">
                        <label class="col-sm-2 form-label">{{$newLang->subjectName}}</label>
                        <div class="col-sm-12">
                            <select name="subject_id" id="subject" class="form-select">
                                <option selected="">{{$newLang->select." ".$newLang->Subject}}</option>
                                @foreach($subjects as $subject)
                                <option class="sub" id="{{$subject->subjectTitle}}" value="{{$subject->id}}">{{$subject->subjectTitle}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 form-label">{{$newLang->teacher}}</label>
                        <div class="col-sm-12">
                            <select name="user_id" id="user" class="form-select">
                                <option>{{$newLang->select." ".$newLang->teacher}}</option>
                                @foreach($teachers as $teacher)
                                <option class="teachers" value="{{$teacher->id}}">{{$teacher->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md-form">
                        <label class="my-2" for="input_starttime">{{$newLang->startTime}}</label>
                        <input placeholder="Selected time" type="time" id="start" name="startTime" class="form-control timepicker">
                    </div>
                    <div class="md-form">
                        <label class="my-2" for="input_starttime">{{$newLang->endTime}}</label>
                        <input placeholder="Selected time" type="time" name="endTime" id="end" class="form-control timepicker">
                    </div>
                    <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>
                </form>
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
<script src="{{asset('assets/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

<!-- Datatable init js -->


<script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>





<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script>
    function getDay(day) {
        $('#day').val(day)
    }

    function getSchedule(classId, sectionId, dayId, subTitle, userName, startTime, endTime, idsub) {
        // console.log(idsub);
        $('#ids').val(idsub);
        $('#classe').val(classId);
        $('#section').val(sectionId);
        $('#dayId').val(dayId);
        $('#start').val(startTime.slice(0, 5));
        $('#end').val(endTime.slice(0, 5));
        // console.log(endTime)
        var newsub = document.querySelectorAll(".sub");
        var newtech = document.querySelectorAll(".teachers");
        for (var i = 0; i < newsub.length; i++) {
            if (newsub[i].getAttribute('id') == subTitle) {
                newsub[i].setAttribute("selected", "true")
            }
        }
        for (var i = 0; i < newtech.length; i++) {
            if (newtech[i].getAttribute('value') == userName) {
                newtech[i].setAttribute("selected", "true")
            }
        }
    }

    function removeClass(subject, id) {
        $('#itemId').val(id);
        $('#removeSubject').text(subject);
    }
</script>

@endsection
@endsection