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

<style>
    input {
        margin: 10px 0;
    }
</style>

@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        @include('admin.inc.massage')
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action='{{route("languages.update",$id)}}' enctype="multipart/form-data">
                            @csrf
                            <label class="col-sm-2 control-label">{{$newLang->editLanguage}} * </label>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" name="languageTitle" class="form-control" value="{{$lang->languageTitle}}" required placeholder="Add language">
                                </div>
                            </div>
                            <label class="col-sm-2 control-label">{{$newLang->LanguageCode}}* </label>
                            <div class="form-group row" ng-class="{'has-error': addLang.languageUniversal.$invalid}">
                                <div class="col-sm-12">
                                    <input type="text" name="languageUniversal" value="{{$lang->languageUniversal}}"  class="form-control" required placeholder="Language universal code">
                                </div>
                            </div>
                            <div class="">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="image">
                                    
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label class="col-sm-2 control-label">{{$newLang->direction}} *</label>
                                <div class="col-sm-10">

                                    <div class="radio-list">
                                        <label>
                                            <input type="radio" name="isRTL" value="0" {{$lang->languagePhrases? "" : "checked"}} required>
                                            {{$newLang->ltr}}
                                        </label>
                                    </div>
                                    <div class="radio-list">
                                        <label>
                                            <input type="radio" name="isRTL" value="1" {{$lang->languagePhrases ? "checked" : ""}}  required>
                                            {{$newLang->rtl}}
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 phraseList">
                                    <div class="row">
                                        <h4 class="col-sm-12">{{$newLang->languagePhrases}}</h4>
                                        @foreach($words as $key=>$val)
                                        <label class="col-sm-2">{{$val}} <br /> <input type="text" name="languagePhrases[{{$key}}]" value="{{$val}}"> </label>
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-b-0">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-info waves-effect waves-light" >add lang</button>
                                </div>
                            </div>
                        </form>
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