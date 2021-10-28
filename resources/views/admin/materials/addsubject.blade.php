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
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add subject</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12" data-select2-id="9">
            <div class="card" data-select2-id="8">
                <div class="card-body" data-select2-id="7">
                    @include('admin.inc.massage')

                    <form method="post" action="{{url('/admin/subject/store')}}">
                        @csrf
                        <label class="form-label">Subject</label>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" name="subject" id="subject2" placeholder="Subject Name">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <div class="col-lg-6  mo-b-15">
                                <label class="form-label">pass </label>
                                <input class="form-control" type="number" id="name" name="pass_grade" placeholder="Pass grade">
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">final</label>
                                <input class="form-control" type="number" id="example-email-input3" name="final_grade" placeholder="Final grade">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-lg mt-2">Add</button>
                    </form>
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