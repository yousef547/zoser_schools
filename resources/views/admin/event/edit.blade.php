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
                <h4 class="mb-0 font-size-18">Events</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Default Datatable</h5>
                    <div>
                        <form method="POST" action="{{url('admin/event/update')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$id}}">
                            <div class="mb-3 ">
                                <label for="example-password-input1" class="form-label">Event Title</label>
                                <div class="">
                                    <input class="form-control" type="text" id="example-password-input1" name="title" placeholder="Event Title" value="{{$event->eventTitle}}">
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-password-input1" class="form-label">Event Description</label>
                                <div class="">
                                    <textarea class="form-control" rows="13" cols="20" name="description" placeholder="Event Description" >{{$event->eventDescription}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-password-input1" class="form-label">Event Place
                                </label>
                                <div class="">
                                    <input class="form-control" type="text" id="example-password-input1" name="Place" placeholder="Event Place" value="{{$event->enentPlace}}">
                                </div>
                            </div>
                            <label class="col-sm-2 form-label">For</label>

                            <div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" class="form-check-input" {{$event->eventFor == 'all' ? "checked" : "" }}  value="all">
                                    <label class="form-check-label" for="customRadio1">All</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" class="form-check-input" value="student" {{$event->eventFor == 'student' ? "checked" : "" }}>
                                    <label class="form-check-label" for="customRadio1">Student</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" class="form-check-input" value="teacher" {{$event->eventFor == 'teacher' ? "checked" : "" }}>
                                    <label class="form-check-label" for="customRadio1">Teacher</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="eventFor" class="form-check-input" value="parent" {{$event->eventFor == 'parent' ? "checked" : "" }}>
                                    <label class="form-check-label" for="customRadio1">parent</label>
                                </div>
                            </div>
                            <div class="mb-3 ">
                                <label for="example-password-input1" class="form-label">Date
                                </label>
                                <div class="">
                                    <input class="form-control" type="date" id="example-password-input1" name="date" value="{{$event->eventDate}}">
                                </div>
                            </div>
                            <label class="col-sm-2 form-label" for="inputGroupFile01">Image</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="img" id="inputGroupFile01">
                            </div>
                            <label class="col-sm-2 form-label">Visible in CMS</label>
                            <div>
                                <div class="form-check my-2">
                                    <input type="radio" name="visible" class="form-check-input" {{$event->active == '1' ? "checked" : "" }} value="1">
                                    <label class="form-check-label" for="customRadio1">Active</label>
                                </div>
                                <div class="form-check my-2">
                                    <input type="radio" name="visible" class="form-check-input" value="0" {{$event->active == '0' ? "checked" : "" }}>
                                    <label class="form-check-label" for="customRadio1">Inactive</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add Grade level</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

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

</script>
@endsection
@endsection