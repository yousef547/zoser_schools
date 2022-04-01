@extends('layouts.layout')
@section('title')
HomePage
@endsection
@section('styles')
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/app.min.css')}}" id="app-style"  rel="stylesheet" type="text/css">


@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{$newLang->studyMaterial}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card profile">
                <div class="card-body">
                   <h5>{{$newLang->listStudyMaterial}}</h5>
                   <div class="">
                       <div class="row">
                           @foreach($materials as $material)
                           <div class="col-md-3 my-3">
                               <a href='{{url("admin/materials/$material->id")}}'>
                                   <div class="card">
                                       <img src='{{asset("/images/$material->photo")}}' class="card-img-top" alt="">
                                       <div class="card-body">
                                            <h2 class="text-center ng-binding">{{$material->subjectTitle}}</h2> 
                                        </div>
                                    </div>
                               </a>
                           </div>
                           @endforeach
                       </div>
                   </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>
</div>
@section('script')

<script>
</script>
@endsection
@endsection