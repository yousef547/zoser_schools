@extends('layouts.layout')
@section('title')
Levels
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


@endsection
@section('content')

<section class="content">
    <div class="container-fluid">
        @include('admin.inc.massage')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @can("level_create")
                                        <a class="btn btn-primary" href="{{route('level.create')}}">{{$newLang->addLevel}}</a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable" class="table table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10%;"># </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 15%;">{{$newLang->levelName}} </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 35%;">{{$newLang->levelDesc}} </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10%;">{{$newLang->degree}} </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20%;">{{$newLang->vquestions}} </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10%;">{{$newLang->Operations}} </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($levels as $key=>$level)
                                                <tr>
                                                    <td>{{$key + 1}}</td>
                                                    <td>{{$level->lavel_name}}</td>
                                                    <td>{{$level->desc}}</td>
                                                    <td>{{$level->lowest_degree}}</td>
                                                    <td>
                                                        @can("level_show_question")
                                                        <a class="btn btn-info" href='{{route("level.view",$level->id)}}'>{{$newLang->questions}}</a>
                                                        @endcan
                                                    </td>
                                                    <td>
                                                    @can("level_show_question")

                                                        <a class="btn btn-skype btn-rounded ms-1" href='{{route("level.edit",$level->id)}}'><i class="fas fa-pencil-alt" style="margin-right:-3px; margin-top:6px"></i></a>
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

    </div>
</section>

@section('script')
<script>

</script>
@endsection
@endsection