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
<style>
    .buttons-html5,
    .btn-group {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.inc.massage')
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Students</h4>
            </div>
        </div>
    </div>
    <div class="row" id="flex">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            @can('roles_add_role')
                            <a href="{{route('role.create')}}" class="btn btn-primary mb-2">create role</a>
                            @endcan
                        </div>
                     
                        <div class="col-sm-12">
                            <table id="datatable-buttons" class="table table-striped table-bordered w-100 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 20%;">Rule Title</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 400px;">Role Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 140.425px;">Operations</th>
                                    </tr>
                                </thead>
                                <tbody id="old_data">
                                    @foreach($roles as $key=>$role)
                                    <tr class=" ">
                                        <td class="sorting_1 centers">{{$role->role_title}}</td>
                                        <td class="centers">{{$role->role_description}}</td>
                                        <td class="centers">
                                           @can('roles_modify_role') <a href="{{route('role.edit',$role->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>@endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>


                            </table>
                        </div>
                    </div>
                    <div id="paginat">
                        {{$roles->links('admin.inc.paginator')}}
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