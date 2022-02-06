
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

<section class="content">
    <div class="container-fluid">
        @include('admin.inc.massage')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">{{$newLang->level}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach($levels as $level)
                            @if($level->degree >= 1)
                            <div class="col-md-3">
                                <a href="{{route('exam.test',$level->id)}}">
                                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                        <h2 class="card-header bg-primary">{{$level->lavel_name}}</h2>
                                        <div class="card-body">
                                            <p class="card-text">{{$level->desc}}</p>
                                        </div>
                                        @if($level->degree == 1 || $level->degree == null)
                                        <h2 class="card-header bg-primary">{{$newLang->degree}}:0</h2>
                                        @else
                                        <h2 class="card-header bg-primary">{{$newLang->degree." : ".$level->degree}}</h2>
                                        @endif
    
                                    </div>
                                </a>
                            </div>
                            @elseif($level->degree == null)
                            <div class="col-md-3">
                                <a>
                                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                                        <h2 class="card-header bg-secondary ">{{$level->lavel_name}}</h2>
                                        <div class="card-body">
                                            <p class="card-text">{{$level->desc}}</p>
                                        </div>
                                        @if($level->degree == 1 || $level->degree == null)
                                        <h2 class="card-header bg-secondary ">{{$newLang->degree}}:0</h2>
                                        @else
                                        <h2 class="card-header bg-secondary ">{{$newLang->degree." : ".$level->degree}}</h2>
                                        @endif
    
                                    </div>
                                </a>
                            </div>
                            @endif
                            @endforeach
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


