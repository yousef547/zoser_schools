@php
use App\Models\report;
@endphp
@extends('layouts.layout')
@section('title')
Juhu / Reports
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
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Table Dark bordered</h4>
                </div>
                <!-- "studentReport":"Students's report","details":"Details","addReport:"Add Report",-->
                <!-- "studentReport":"تقرير الطلاب","details":"التفاصيل","addReport:"اضافة التقرير",-->

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-primary mb-0">
                            <tbody>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{$newLang->name}}</th>
                                    <th scope="col">{{$newLang->email}}</th>
                                    @can("report_create")
                                    <th scope="col">{{$newLang->Operations}}</th>
                                    @endcan

                                    <th scope="col">{{$newLang->details}}</th>

                                </tr>
                            </tbody>
                            <tbody>
                                @foreach($allStudent as $key=>$Student)
                                @php
                                $studentReport = report::where("user_id",$Student->id)->first();

                                @endphp

                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$Student->username}}</td>
                                    <td>{{$Student->email}}</td>
                                    @can("report_create")
                                    <td>
                                        <a class="btn btn-success" href='{{route("report.show",$Student->id)}}'>{{$newLang->addReport}}</a>
                                    </td>
                                    @endcan
                                    <td>
                                        <a class="btn btn-danger" href='{{route("report.details",$Student->id)}}'>{{$newLang->details}}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class=" pt-5">
                        {{ $allStudent->links('admin.inc.paginator') }}
                    </div>
                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

@section('script')
<script>

</script>
@endsection
@endsection