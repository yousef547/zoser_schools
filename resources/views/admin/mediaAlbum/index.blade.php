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
    .el-overlay-1 {
        overflow: hidden;
        height: 300px;
    }

    .el-overlay-1 img {
        transition: all .4s ease-in-out;
    }

    .el-overlay-1:hover img {
        transform: scale(1.2);
    }

    .el-overlay-1:hover .el-overlay {
        display: block;
    }

    .el-overlay {
        position: absolute;
        background: rgb(0 0 0 / 50%);
        width: 100%;
        top: 0;
        left: 0;
        height: 100%;
        display: none;

    }

    .lista li {
        border: 1px solid #fff;
        width: 45px;
        height: 45px;
        margin: 0 2px;
        border-radius: 20%;
    }

    .lista li:hover {
        background-color: rgb(0, 158, 251);
        transition: all ease-in-out 0.5s;
    }

    .lista i {
        color: #fff;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Media Center</h4>
            </div>
        </div>
        <div class="col-md-6 col-4 align-self-center text-end">
            <a href="{{url('admin/media/upload')}}" class="btn pull-right btn-primary card-block-input-item"><i class="mdi mdi-plus-circle"></i> Upload media</a>
            <a href="{{url('admin/item/create')}}" class="btn pull-right btn-primary card-block-input-item"><i class="mdi mdi-plus-circle"></i> Add album</a>
        </div>
        @if(count($albums) > 0)
        <div class="col-12">
            <h5 class="card-title">Albums</h5>
            <div class="row">
                @foreach($albums as $albums)
                <div class="col-lg-3 col-md-6 ">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1 position-relative">
                                <img src='{{asset("uploads/$albums->albumImage")}}' class="w-100 h-100">
                                <div class="el-overlay">
                                    <ul class=" lista list-unstyled h-100 d-flex justify-content-center align-items-center">
                                        <li><a href='{{url("admin/media/show/$albums->id")}}' data-bs-toggle="tooltip" data-bs-placement="top" title="Show" class="btn default btn-outline"><i class="mdi mdi-magnify fs-4 "></i></a></li>
                                        <li class=""><a href='{{url("admin/media/edit/$albums->id")}}' data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn default btn-outline"><i class="fas fs-4 mt-1 fa-pencil-alt"></i></a></li>
                                        <li class=""><a href='{{url("admin/media/delete/$albums->id")}}' data-bs-toggle="tooltip" data-bs-placement="top" title="Remove" class="btn default btn-outline"><i class="fas fs-4 mt-1 fa-trash"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title text-center my-3 ng-binding">{{$albums->albumTitle}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @if(count($items) > 0)
        <div class="col-12">
            <h5 class="card-title">Media</h5>
            <div class="row">
                @foreach($items as $item)
                <div class="col-lg-3 col-md-6 ">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1 position-relative">
                                @if($item->mediaURL == null)
                                <iframe class="w-100 h-100" src="{{$item->mediaURLThumb}}"></iframe>
                                @else
                                <img src='{{asset("uploads/$item->mediaURL")}}' class="w-100 h-100">
                                @endif
                                <div class="el-overlay">
                                    <ul class=" lista list-unstyled h-100 d-flex justify-content-center align-items-center">
                                        <li><a href='{{url("admin/item/show/$item->id")}}' data-bs-toggle="tooltip" data-bs-placement="top" title="Show" class="btn default btn-outline"><i class="mdi mdi-magnify fs-4 "></i></a></li>
                                        <li class=""><a href='{{url("admin/item/edit/$item->id")}}' data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="btn default btn-outline"><i class="fas fs-4 mt-1 fa-pencil-alt"></i></a></li>
                                        <li class=""><a href='{{url("admin/media/delete/")}}' data-bs-toggle="tooltip" data-bs-placement="top" title="Remove" class="btn default btn-outline"><i class="fas fs-4 mt-1 fa-trash"></i></a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title text-center my-3 ng-binding">{{$item->mediaTitle}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
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