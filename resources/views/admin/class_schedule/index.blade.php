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
    font-weight: 600  !important;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
@include('admin.inc.massage')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Select class to edit schedule</h5>
                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">

                           
                                @foreach($sect as $key => $section)
                                <div class="col-sm-12">
                                    <h4 class="ng-binding">{{$section->className}}</h4>
                                    
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="font-size: 20px; font-weight: 600">Section name</th>
                                                <th scope="col" style="font-size: 20px; font-weight: 600">Section Title</th>
                                                <th scope="col" style="font-size: 20px; font-weight: 600">Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($section->sections as $onee)
                                            <tr>
                                                <td>{{$onee->sectionName}} </td>
                                                <td>{{$onee->sectionTitle}}
                                                </td>
                                                <td>
                                                 <a href='{{url("admin/class_schedulr/timetable")}}/{{$onee->id}}' class="btn btn-info btn-rounded"><i class="fa fa-fw fa-th-list"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                   
                                </div>
                                @endforeach
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