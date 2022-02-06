<?php

use App\Models\result_exam;
?>
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

            <div class="col-12 col-lg-12 box-footer">
                <div class="box ">
                    <div class="box-header with-border">
                        <h4 class="box-title"> {{$newLang->exam}}</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{$newLang->examName}}</th>
                                        <th scope="col">{{$newLang->Exam_Description}}</th>
                                        <th scope="col">{{$newLang->degree}}</th>
                                        <th scope="col">{{$newLang->Operations}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allexam as $key=>$exam)
                                    @php
                                    $result = "Not Tested";
                                    $result_exam = result_exam::where("user_id", Auth()->user()->id)
                                    ->where("exam_id", $exam->id)->first();
                                    if($result_exam){
                                    $result = $result_exam->result;
                                    }

                                    @endphp
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$exam->exam_name}}</td>
                                        <td>{{$exam->exam_desc}}</td>
                                        <td>
                                            @if($result == "Not Tested")
                                            <span class="badge bg-danger">{{$result}}</span>
                                            @else
                                            <span class="badge bg-success">{{$result}} %</span>

                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{route('testexam.test',$exam->id)}}" class="btn btn-rounded btn-success ">{{$newLang->exam}}</a>
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