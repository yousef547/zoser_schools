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

        <div class="col-lg-12 col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Report</h4>
                </div>
                <!-- /.box-header -->
                <form class="form" action="{{route('report.submit')}}" method="POST">
                    @csrf
                    <input type="number" hidden name="user_id" value="{{$studen->id}}">
                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> {{$studen->name}}</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Teilnahme</label>
                                    <select class="form-control" name="teilnahme">
                                        <option>Select GPA</option>
                                        <option value="1">GPA 1</option>
                                        <option value="2">GPA 2</option>
                                        <option value="3">GPA 3</option>
                                        <option value="4">GPA 4</option>
                                        <option value="5">GPA 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hausausarbeiten</label>
                                    <select class="form-control" name="hausausarbeiten">
                                        <option>Select GPA</option>
                                        <option value="1">GPA 1</option>
                                        <option value="2">GPA 2</option>
                                        <option value="3">GPA 3</option>
                                        <option value="4">GPA 4</option>
                                        <option value="5">GPA 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sprachkompetenz</label>
                                    <select class="form-control" name="sprachkompetenz">
                                        <option>Select GPA</option>
                                        <option value="1">GPA 1</option>
                                        <option value="2">GPA 2</option>
                                        <option value="3">GPA 3</option>
                                        <option value="4">GPA 4</option>
                                        <option value="5">GPA 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aussprache</label>
                                    <select class="form-control" name="aussprache">
                                        <option>Select GPA</option>
                                        <option value="1">GPA 1</option>
                                        <option value="2">GPA 2</option>
                                        <option value="3">GPA 3</option>
                                        <option value="4">GPA 4</option>
                                        <option value="5">GPA 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Grammatik</label>
                                    <select class="form-control" name="grammatik">
                                        <option>Select GPA</option>
                                        <option value="1">GPA 1</option>
                                        <option value="2">GPA 2</option>
                                        <option value="3">GPA 3</option>
                                        <option value="4">GPA 4</option>
                                        <option value="5">GPA 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Wortschatz</label>
                                    <select class="form-control" name="wortschatz">
                                        <option>Select GPA</option>
                                        <option value="1">GPA 1</option>
                                        <option value="2">GPA 2</option>
                                        <option value="3">GPA 3</option>
                                        <option value="4">GPA 4</option>
                                        <option value="5">GPA 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Verständnis</label>
                                    <select class="form-control" name="verständnis">
                                        <option>Select GPA</option>
                                        <option value="1">GPA 1</option>
                                        <option value="2">GPA 2</option>
                                        <option value="3">GPA 3</option>
                                        <option value="4">GPA 4</option>
                                        <option value="5">GPA 5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Verständnis</label>
                                <div class="form-group">
                                   <textarea name="comment" id="" cols="156" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                    </div>
                </form>
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