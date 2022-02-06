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

    <style>
        .bg-gradient {
            background-image: linear-gradient(black, white) !important
        }
    </style>

@endsection
@section('content')

<section class="content">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">{{$newLang->report}}</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @foreach($reports as $key=>$report)
                        <div class="col-md-3">
                            <a href="{{route('report.myreport.show',$report->id)}}" class="bg-info text-decoration-none text-white">
                                <div class="card rounded-circle text-center bg-gradient" style="width:250px;height:250px">
                                    @if($report->status == 'new')
                                    <h6 style="text-align: end;"><span class="badge bg-secondary " >New</span></h6>
                                    <h2 style="line-height:5">{{$newLang->report}} {{$key + 1}}</h2>
                                    @else
                                    <h2 style="line-height:7">{{$newLang->report}} {{$key + 1}}</h2>
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>


                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</section>

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="{{asset('assets/js/tableHTMLExport.js')}}"></script>
<!-- <script src="{{asset('assets/js/tableHTMLExport.js')}}"></script> -->
<script>

</script>
@endsection
@endsection

@php


$reports = report::where('user_id', Auth()->user()->id)->get();

for ($i = 0; $i < count($reports); $i++) {
    $reports[$i]->update([
        'status' => 'old',
    ]);
}
@endphp