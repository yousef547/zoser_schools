@extends('layouts.layout')
@section('title')
Juhu / Test
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

            <div class="col-12 col-lg-12 box-footer">
                <div class="box ">
                    <div class="box-header with-border">
                        <h4 class="box-title">{{$newLang->allTest}}</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{$newLang->testN}}</th>
                                        <th scope="col">{{$newLang->testD}}</th>
                                        <th scope="col">{{$newLang->Operations}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tests as $key=>$test)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$test->test_name}}</td>
                                        <td>{{$test->test_desc}}</td>
                                        <td>
                                            <a href="{{route('exam.show',[$id,$test->id,])}}" class="btn btn-rounded btn-success ">{{$newLang->exam}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

    </div>
</section>
@section('script')
<script>

</script>
@endsection
@endsection