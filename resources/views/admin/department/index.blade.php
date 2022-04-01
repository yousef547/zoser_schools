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
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.inc.massage')
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{$newLang->depart}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="row" id="flex">
        <div class="" id="card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    @can("depart_add_depart")
                                    <a href="{{url('admin/department/create')}}" class="btn btn-secondary buttons-copy buttons-html5">{{$newLang->add_depart}}</a>
                                    @endcan
                                </div>
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 45%;">{{$newLang->depart_title}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:45%;">{{ $newLang->depart_desc}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10%">{{$newLang->Operations}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($departs as $key => $depart)
                                            <tr class="">
                                                <td>{{$depart->depart_title}}</td>
                                                <td>{{$depart->depart_desc}}</td>
                                                <td>
                                                    @can("depart_edit_depart")
                                                    <a onclick='saveDepartment("{{$depart->id}}","{{$depart->depart_title}}","{{$depart->depart_desc}}")' class="btn btn-info btn-rounded mx-1" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-lg">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    @endcan

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $departs->links('admin.inc.paginator') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="myLargeModalLabel">edit_depart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('admin/department/update')}}">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <label class="form-label">{{$newLang->depart_title}} *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" id="title" name="depart_title" placeholder="{$newLang->depart_title}}">
                        </div>
                    </div>
                    <label class="form-label">{{$newLang->depart_desc}} *</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" id="desc" name="depart_desc" placeholder="{{$newLang->depart_desc}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->submit}}</button>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal-dialog -->

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
<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/table-edits/build/table-edits.min.js')}}"></script>
<script src="{{asset('assets/js/pages/table-editable.init.js')}}"></script>


<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script>
    function saveDepartment(id, title, desc) {
        console.log(title);
        $('#title').val(title);
        $('#desc').val(desc);
        $('#id').val(id);
    }
</script>

@endsection
@endsection