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
        <div class="col-md-12">
            <h5 class="card-title">{{$newLang->Hostel}}</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row my-2">
                        <h5 class="card-title col-md-6">{{$newLang->AddHostel}}</h5>
                        <div class="col-md-6 text-end">
                            @can("Hostel_AddHostel")
                            <a href="{{route('hostel.create')}}" class="btn pull-right btn-success card-block-input-item ">{{$newLang->AddHostel}}</a>
                            @endcan
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>{{$newLang->HostelTitle}}</th>
                                    <th>{{$newLang->Hosteltype}}</th>
                                    <th>{{$newLang->Address}}</th>
                                    <th>{{$newLang->Manager}}</th>
                                    <th>{{$newLang->managerContact}}</th>
                                    <th>{{$newLang->Operations}}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hostels as $hostel)
                                <tr>
                                    <th scope="row">{{$hostel->hostelTitle}}</th>
                                    <td>{{$hostel->hostelType}}</td>
                                    <td>{{$hostel->hostelAddress}}</td>
                                    <td>
                                        <img src='{{asset("uploads/$hostel->managerPhoto")}}' width='50px' height='50px' />
                                        {{$hostel->hostelManager}}
                                    </td>
                                    <td>{{$hostel->managerContact}}</td>
                                    <td>
                                        @can("Hostel_EditHostel")
                                        <a href="{{route('hostel.edit',$hostel->id)}}" class="btn btn-info btn-rounded mx-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        @endcan
                                        @can("Hostel_delHostel")
                                        <a href="{{route('hostel.delete',$hostel->id)}}" class="btn btn-danger btn-rounded mx-1">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        @endcan
                                        <a href="" class="btn btn-success btn-rounded mx-1">
                                            <i class="fa fa-list"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
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