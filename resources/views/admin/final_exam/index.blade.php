@extends('layouts.layout')
@section('title')
Exam
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

<section class="content mt-0">
    <div class="container-fluid">
        @include('admin.inc.massage')
        <div class="row">
            @can("finelExam_create")
            <div class="col-md-12">
                <form action="{{route('finalexam.save')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="my-2">{{$newLang->examName}}</label>
                                    <input type="text" class="form-control " name="exam_name" placeholder="{{$newLang->examName}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="my-2">{{$newLang->Exam_Description}}</label>
                            <textarea rows="4" class="form-control" name="exam_desc" placeholder="{{$newLang->Exam_Description}}"></textarea>
                        </div>
                    </div>
                    <div class="box-footer ">
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline mr-1 my-2">
                            <i class="ti-save-alt"></i> {{$newLang->addExam}}
                        </button>
                    </div>
                </form>
            </div>
            <hr>
            @endcan
            <div class="col-12 col-lg-12 box-footer">
                <div class="box ">
                    <div class="box-header with-border">
                        <h4 class="box-title">{{$newLang->allExam}}</h4>
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
                                        <th scope="col">{{$newLang->Operations}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allexam as $key=>$exam)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{{$exam->exam_name}}</td>
                                        <td>{{$exam->exam_desc}}</td>
                                        <td>
                                            <a href="{{route('finalexam.show',$exam->id)}}" class="btn btn-rounded btn-danger">{{$newLang->Questions}}</a>
                                            @can("finelExam_add_questions")
                                            <a href="{{route('finalexam.add',$exam->id)}}" class="btn btn-rounded btn-success ">{{$newLang->add_question}}</a>
                                            @endcan
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