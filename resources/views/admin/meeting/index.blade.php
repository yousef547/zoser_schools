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
                <h4 class="mb-0 font-size-18">Meetings</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    @can("Meetings_addMeeting")
                                    <a class="btn btn-primary" href="{{url('admin/meeting/create')}}">Create Meeting</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30%;">
                                                    Meeting Title </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 30%;">Scheduled Time</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 30%;">Meeting Presenter </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 10%;">Operations </th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($meetings as $meeting)
                                            <tr>
                                                <td class="sorting_1">{{$meeting->conference_title}}
                                                    <br>
                                                    {{$meeting->conference_desc}}
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($meeting->scheduled_date)->format('y/m/d h:i A')}}
                                                    <br>
                                                    Duration (Minutes):{{$meeting->conference_duration}}
                                                </td>
                                                <td>{{$meeting->user_host('user')}} </td>
                                                <td>
                                                    @can("Meetings_editMeeting")
                                                    <a class="btn btn-skype btn-rounded ms-1" href='{{url("admin/meeting/update/$meeting->id")}}'><i class="fas fa-pencil-alt"></i></a>
                                                    @endcan
                                                    @can("Meetings_delMeet")

                                                    <a href='{{url("admin/meeting/delete/$meeting->id")}}' class="btn btn-danger btn-rounded mx-1">
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