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
                <h4 class="mb-0 font-size-18">{{$newLang->parent}}</h4>
            </div>
        </div>
        <div class="row" id="flex">
            <div class="" id="card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="datatable2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        @can("parents_AddParent")
                                        <a href="{{url('admin/parent/create')}}" class="btn btn-secondary buttons-copy buttons-html5">{{$newLang->AddParent}}</a>
                                        @endcan
                                    </div>
                                    <div class="col-sm-12">
                                        <table id="datatable2" class="table dataTable no-footer" role="grid" aria-describedby="datatable2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5%;">#</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:25%;">{{$newLang->FullName}}</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20%">{{$newLang->username}}</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30%">{{$newLang->email}}</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 20%;">{{$newLang->Operations}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($parents as $key => $parent)
                                                <tr class="{{ $key%2==0 ? 'odd' : 'even'  }}" id="t_{{$parent->id}}">
                                                    <td class="sorting_1">{{$parent->id}}</td>
                                                    <td>{{$parent->fullName}}
                                                        <!-- @if($parent->active)
                                                        <i class="far fa-lightbulb text-success " id="a_{{$parent->id}}"></i>
                                                        @else
                                                        <i class="far fa-lightbulb text-danger" id="a_{{$parent->id}}"></i>
                                                        @endif
                                                        <br> -->
                                                    </td>
                                                    <td>{{$parent->username}}</td>
                                                    <td>{{$parent->email}}</td>
                                                    <td>
                                                        @can('parents_Approve')
                                                        <a class="btn btn-warning btn-rounded mx-1" onclick='goActive("{{$parent->id}}")'>
                                                            <i class="far fa-lightbulb"></i>
                                                        </a>
                                                        @endcan
                                                        @can('parents_editParent')
                                                        <a href='' class="btn btn-info btn-rounded mx-1">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        @endcan
                                                        @can("parents_delParent")
                                                        <a onclick='deleteemployee("{{$parent->id}}")' class="btn btn-danger btn-rounded mx-1">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
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

<script>

</script>

@endsection
@endsection