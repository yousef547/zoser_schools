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
                <h4 class="mb-0 font-size-18">Grade levels</h4>
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
                                    @can("gradeLevels_addLevel")
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalform">add Grade levels</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5%;">
                                                    Grade Name </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 30%;">Grade Description</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 30%;">Grade Point </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20%;">From -> To </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 15%;">Operations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($levels as $level)
                                            <tr>
                                                <td class="sorting_1">{{$level->gradeName}}</td>
                                                <td>{{$level->gradeDescription}}</td>
                                                <td>{{$level->gradePoints}}</td>
                                                <td>{{$level->gradeFrom}} -> {{$level->gradeTo}} </td>
                                                <td>
                                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-lg">Large modal</button> -->
                                                    @can("gradeLevels_editGrade")

                                                    <a class="btn btn-skype btn-rounded ms-1" onclick='setLavel("{{$level->gradeName}}","{{$level->gradeDescription}}","{{$level->gradePoints}}","{{$level->gradeTo}}","{{$level->gradeFrom}}","{{$level->id}}")' data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-lg"><i class="fas fa-pencil-alt"></i></a>
                                                    @endcan
                                                    @can("gradeLevels_delGradeLevel")
                                                    <a href="{{url('admin/Gradelevels/remove')}}/{{$level->id}}" class="btn btn-danger btn-rounded mx-1">
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
                            {{ $levels->links('admin.inc.paginator') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <div class="modal fade bs-example-modal-lg show" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="myLargeModalLabel">add teacher </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('admin/Gradelevels/update')}}">
                        @csrf
                        <input type="hidden" name="id" id="lavelId">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade Name </label>
                                    <input type="text" class="form-control" name="gradeName" id="name" placeholder="Grade Name">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade Description</label>
                                    <input type="text" class="form-control" name="gradeDescription" id="description" placeholder="Grade Description">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade Point</label>
                                    <input type="text" class="form-control" name="gradePoints" id="Point" placeholder="Grade Point">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade From</label>
                                    <input type="text" class="form-control" id="from" name="gradeFrom" placeholder="Grade From">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade To</label>
                                    <input type="text" class="form-control" id="to" name="gradeTo" placeholder="Grade To">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Grade level</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade show" id="exampleModalform" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-self-center" id="exampleModalform1">Add Grade level</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url('admin/Gradelevels/create')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade Name </label>
                                    <input type="text" class="form-control" name="gradeName" id="field-3" placeholder="Grade Name">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade Description</label>
                                    <input type="text" class="form-control" name="gradeDescription" id="field-3" placeholder="Grade Description">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade Point</label>
                                    <input type="text" class="form-control" name="gradePoints" id="field-3" placeholder="Grade Point">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade From</label>
                                    <input type="text" class="form-control" id="field-3" name="gradeFrom" placeholder="Grade From">
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Grade To</label>
                                    <input type="text" class="form-control" id="field-3" name="gradeTo" placeholder="Grade To">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Grade level</button>
                        </div>
                    </form>
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
    // < a class = "btn btn-skype btn-rounded ms-1"
    // onclick = 'setLavel("{{$level->gradeName}}","{{$level->gradeDescription}}","{{$level->gradePoints}}","{{$level->gradeTo}}","{{$level->gradeFrom}}","{{$level->id}}")'
    // data - bs - toggle = "modal"
    // data - animation = "bounce"
    // data - bs - target = ".bs-example-modal-lg" > < i class = "fas fa-pencil-alt" > < /i></a >

    function setLavel(name, description, points, geadeto, geadeform, geadeId) {
        console.log(name)
        console.log(description)
        console.log(points)
        console.log(geadeto)
        console.log(geadeform)
        console.log(geadeId)

        $('#lavelId').val(geadeId)
        $('#name').val(name)
        $('#description').val(description)
        $('#Point').val(points)
        $('#from').val(geadeform)
        $('#to').val(geadeto)



    }
</script>
@endsection
@endsection