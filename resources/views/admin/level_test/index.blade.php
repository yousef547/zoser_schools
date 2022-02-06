@extends('layouts.layout')
@section('title')
Juhu / Exam
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
            @can("test_create")
            <div class="col-md-12">
                <form action="{{route('level_test.submit')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                   

                                    <label class="my-2">{{$newLang->testN}}</label>
                                    <input type="text" class="form-control" name="test_name" placeholder="{{$newLang->testN}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="my-2">{{$newLang->testD}}</label>
                            <textarea rows="4" class="form-control" name="test_desc" placeholder="{{$newLang->testD}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="my-2">{{$newLang->level}}</label>
                            <select class="form-control" name="level_id">
                                <option>{{$newLang->select ." ". $newLang->level}}</option>
                                @foreach($levels as $level)
                                <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer ">
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline mr-1 my-4">
                            <i class="ti-save-alt"></i> {{$newLang->add_test}}
                        </button>
                    </div>
                </form>
            </div>
            @endcan
            <hr>
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
                                        <th scope="col">{{$newLang->level}}</th>
                                        <th scope="col">{{$newLang->Operations}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tests as $key=>$test)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$test->test_name}}</td>
                                        <td>{{$test->test_desc}}</td>
                                        <td>{{App\Models\level::find($test->level_id)->lavel_name}}</td>
                                        <td>
                                            <a href="{{route('level_test.show',[$test->id,$test->level_id])}}" class="btn btn-rounded btn-danger"> {{$newLang->Questions}}</a>
                                            @can("test_add_questions")
                                            <a href="{{route('level_test.add',[$test->id,$test->level_id])}}" class="btn btn-rounded btn-success ">{{$newLang->add_question}}</a>
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