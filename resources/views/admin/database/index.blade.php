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
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Database</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row ng-scope">
                        <div class="col-md-3 no-print">
                            <div class="card">
                                <div class="card-block">
                                    <div class="list-group">

                                        <a class="list-group-item ng-binding active export" onclick="change('export')">Export</a>
                                        <a class="list-group-item ng-binding import" onclick="change('import')">Import</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card p-5">
                                <div class="card-block">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="export">
                                            <h3>Export</h3>
                                            <br>
                                            <div class="form-group row">
                                                <div class="col-sm-9 control-label">
                                                    <form action="{{ route('our_backup_database') }}" method="get" id="form_format">
                                                        <div class="mb-3 row">
                                                            <div class="col-sm-12">
                                                                <label class="col-sm-2 form-label">Select Format</label>
                                                                <select class="form-select" id="select_formats" name="format">
                                                                    <option value="">Select Format</option>
                                                                    <option value="sql">SQL</option>
                                                                    <option value="csv">CSv</option>
                                                                    <option value="json">JSON</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!-- <button type="submit" class="btn btn-primary"> download</button> -->
                                                    </form>
                                                    <!-- <a href="backup" target="_BLANK" class="ng-binding">Click here to export Database</a> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane " id="import">
                                            <h3>Import</h3>
                                            <br>
                                            <div class="form-group row">
                                                <label class="col-sm-3 text-right control-label col-form-label ">Import * </label>
                                                <div class="col-sm-9 ">
                                                    To import, Please use PHPMyAdmin to ensure maximum data consistency.
                                                </div>
                                            </div>


                                        </div>

                                    </div>

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
    $('#select_formats').on('change', function(e) {
        e.preventDefault();
        $('#form_format').submit();
        // console.log('yyyyyy')
    });
    function change(type){
        // $()
        $('.'+type).addClass('active').siblings().removeClass('active');
        $('#'+type).addClass('active').siblings().removeClass('active');

        console.log();
    }
</script>
@endsection
@endsection