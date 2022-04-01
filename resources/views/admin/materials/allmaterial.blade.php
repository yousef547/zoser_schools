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
        <div class="col-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h2 class="mb-0 font-size-18">{{$newLang->studyMaterial}}</h2>

            </div>
        </div>
        <div class="col-6">
            <div class="page-title-box d-flex align-items-center justify-content-end">
                <div class="d-flex flex-column text-end justify-content-end" style="width: 35%;">
                    <h4 class="mb-0 font-size-18">{{$newLang->SearchWeek}}</h4><br>
                    <select name="week" class="w-100" style="height: 30px;">
                        <option value=""></option>
                        @foreach($weeks as $week)
                        <option value="{{$week->id}}">{{$week->week}}</option>
                        @endforeach

                    </select>
                </div>
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
                                    @can("studyMaterial_addMaterial")
                                    <a href="{{url('admin/materials/create')}}/{{$sub_id}}" class="btn btn-secondary buttons-copy buttons-html5">{{$newLang->addMaterial}}</a>
                                    @endcan
                                </div>
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 15%;">{{$newLang->materialTitle}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:25%;"> {{$newLang->materialTitle}} </th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 15%;">{{$newLang->subjectName}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:10%;"> {{$newLang->week}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:15%;"> {{$newLang->class}}</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20%">{{$newLang->Operations}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($materials as $material)
                                            <tr class="">
                                                <td>{{$material->material_title}}</td>
                                                <td>{{$material->material_description}}</td>
                                                <td>{{$material->subjectTitle}}</td>
                                                <td>{{$material->week}}</td>
                                                <td>{{$material->className}} - {{$material->sectionName}}</td>
                                                <td>
                                                    @can("studyMaterial_Download")
                                                    @if($material->material_file)
                                                    <a href='{{asset("uploads/$material->material_file")}}' class="btn btn-warning btn-rounded mx-1" download><i class="fas fa-cloud-download-alt"></i></a>
                                                    @endif
                                                    @endcan
                                                    @can("studyMaterial_editMaterial")
                                                    <a href='{{url("admin/materials/update/")}}/{{$material->id}}' class="btn btn-info btn-rounded mx-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    @endcan
                                                    @can("studyMaterial_delMaterial")

                                                    <a href='{{url("admin/materials/delete/")}}/{{$material->id}}' class="btn btn-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                                    @endcan
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $materials->links('admin.inc.paginator') }}

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
<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/table-edits/build/table-edits.min.js')}}"></script>
<script src="{{asset('assets/js/pages/table-editable.init.js')}}"></script>


<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script>

</script>

@endsection
@endsection