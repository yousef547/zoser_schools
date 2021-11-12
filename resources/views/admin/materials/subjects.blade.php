@extends('layouts.layout')
@section('title')
subjects
@endsection
@section('styles')
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
<!-- DataTables -->
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .dataTables_length {
        display: none;
    }

    /* .dt-bootstrap4 .row:last-of-type>.col-md-5,
    .dt-bootstrap4 .row:last-of-type>.col-md-7 {
        display: none;
    } */
</style>
@endsection
@section('content')
<div class="container-fluid">
@include('admin.inc.massage')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">subject</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{url('admin/addsubject')}}" class="btn btn-primary">add sbject</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 15%;">Subject name </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 35%;">Teachers</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 35%;">Pass grade / Final grade </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 15%;">Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subjects as $subject)
                                            <tr class="odd">
                                                <td class="sorting_1">{{$subject->subjectTitle}}</td>
                                                <td>
                                                    @foreach($allTeacher as $teacher)
                                                    @if($subject->subjectTitle === $teacher->subjectTitle)
                                                    <span id="{{$teacher->user_id}}" class="{{$subject->subjectTitle}}">{{$teacher->username}}</span><br>
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$subject->passGrade}} / {{$subject->finalGrade}}</td>
                                                <td>
                                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-lg">Large modal</button> -->
                                                    <a class="btn btn-skype btn-rounded ms-1" onclick='addTeacher("{{$subject->subjectTitle}}","{{$subject->id}}","{{$subject->passGrade}} "," {{$subject->finalGrade}}")' data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-lg"><i class="fas fa-pencil-alt"></i></a>

                                                </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $subjects->links('admin.inc.paginator') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="modal fade bs-example-modal-lg show" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="myLargeModalLabel">add teacher </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{url('/admin/subject/set_teacher')}}">
                    @csrf
                    <input class="form-control" type="hidden" id="hidden" name="subjectId" placeholder="Subject">

                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="subjectName" id="subject2" placeholder="Subject">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 form-label">Custom Select</label>
                            <div class="col-sm-12">
                                <select class="form-select" name="teacher[]" id="teach" multiple="multiple">
                                    @foreach($teachers as $teacher)
                                    <option class="{{$teacher->id}} selected" value="{{$teacher->id}}">{{$teacher->username}}</option>
                                    @endforeach
                                    <!-- <option selected="">Open this select menu</option>
                                <option value="1">One</option> -->
                                    <!-- <option value="3">Three</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-lg-6  mo-b-15">
                                <input class="form-control" type="text" id="pass" name="pass" placeholder="pass">
                            </div>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" id="final" name="final" placeholder="final">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-lg mt-2">submit</button>

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>s
</div>
@section('script')
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
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

<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script>
    function addTeacher(subjectTitle, SubjectId, pass, final) {
        $('#subject2').val(subjectTitle);
        $('#pass').val(pass);
        $('#final').val(final);
        $('#hidden').val(SubjectId);

        var subject = document.getElementsByClassName(subjectTitle);
        console.log(subject[1]);
        console.log(subject[0]);


       
        
        $.get("subject/get_teacher/" + SubjectId, function(data, status) {
            var teachers = data.data;
            console.log(teachers )
            // debugger;
            $('.selected').attr("selected", false);

            for(var i=0;i<teachers.length;i++){
                for(var y=0;y<subject.length;y++)
                    if(teachers[i].user_id == subject[y].id) {
                        console.log('#'+subject[y].id)
                        $('.'+subject[y].id).attr("selected", true);
                    }
            }
            // console.log(teachers);
        });
        // console.log(subjectTitle + "-" + SubjectId + "-" + pass + "-" + final);
    }
</script>
@endsection
@endsection