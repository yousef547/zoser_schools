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

<section class="content">
    <div class="container-fluid">
        @include('admin.inc.massage')
        <div class="row">
            <div class="col-md-12 col-xl-12">
                @can("Languages_addLanguage")
                <a href="{{route('languages.create')}}" class="btn btn-primary mb-2">{{$newLang->addLanguage}}</a>
                @endcan
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="thead-default">
                                    <tr>
                                        <th>#</th>
                                        <th>{{$newLang->languageName}}</th>
                                        <th>{{$newLang->Operations}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($langs as $key=>$lang)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td><span>{{$lang->languageTitle}}</span>
                                            <img src='{{asset("uploads/$lang->image")}}' height="16" class="me-2" alt="">
                                        </td>
                                        <td>
                                            <div class="">
                                                @can("Languages_editLanguage")
                                                <a href='{{route("languages.edit",$lang->id)}}' class=""><i class="fa fa-edit me-2 font-size-12"></i></a>
                                                @endcan
                                                @can("Languages_delLanguage")
                                                <a href="" class=""><i class="fa fa-trash text-danger"></i></a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@section('script')
<script>

</script>
@endsection
@endsection