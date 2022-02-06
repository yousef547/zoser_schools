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
"editLevel","Edit Level",

@endsection
@section('content')
<section class="content">
    @include('admin.inc.massage')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="box-header with-border">
                            <h4 class="box-title">{{$newLang->editLevel}}</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{route('level.update',$level->id)}}" method="POST">
                                    @csrf
                                    <div class="mb-3 row">

                                        <div class="col-sm-12">
                                            <label class="ml-3 my-3">{{$newLang->levelName}}</label>
                                            <input class="form-control" type="text" id="subject2" name="lavel_name" value="{{$level->lavel_name}}" placeholder="{{$newLang->levelName}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="ml-3 my-3">{{$newLang->levelDesc}}</label>
                                            <input class="form-control" type="text" id="subject2" value="{{$level->desc}}" name="desc" placeholder="{{$newLang->levelDesc}}">
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label class="ml-3 my-3">{{$newLang->degree}}</label>
                                            <select class="form-control" name="lowest_degree">
                                                <option value="">{{$newLang->degree}}</option>
                                                <option value="50" {{$level->lowest_degree == 50 ? 'selected':' '}}>degree 50</option>
                                                <option value="60" {{$level->lowest_degree == 60 ? 'selected':' '}}>degree 60</option>
                                                <option value="70" {{$level->lowest_degree == 70 ? 'selected':' '}}>degree 70</option>
                                                <option value="80" {{$level->lowest_degree == 80 ? 'selected':' '}}>degree 80</option>
                                            </select>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary w-lg">{{$newLang->editLevel}}</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

</section>
@section('script')
<script>

</script>
@endsection
@endsection