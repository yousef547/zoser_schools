@extends('layouts.layout')
@section('title')
Questions / index
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

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-link active" data_questions="choices">{{$newLang->choice}}
                                            </li>
                                            <li class="nav-link" data_questions="record">{{$newLang->audio}}
                                            </li>
                                            <li class="nav-link" data_questions="true_fase">{{$newLang->rightWrong}}
                                            </li>
                                            <li class="nav-link" data_questions="video">{{$newLang->vedio}}
                                            </li>
                                            <li class="nav-link" data_questions="reading">{{$newLang->reading}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mt-5">
                                        <div class="col-md-12 questions" id="choices">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('questions.choices')}}" method="POST">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <div class="col-sm-12">
                                                                <label class="form-label mb-2">{{$newLang->Question}}</label>
                                                                <input class="form-control" name="choices" type="text" id="subject2" placeholder="{{$newLang->Question}}">
                                                            </div>
                                                            <div class="col-sm-12">

                                                                <label class="form-label my-2">{{$newLang->level}}</label>
                                                                <select name="level" class="form-control">
                                                                    <option selected="">{{$newLang->select ." ". $newLang->level }}</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>


                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">{{$newLang->cor_ans}} <i class="fa fa-check"></i></label>
                                                                <input class="form-control my-2" type="text" name="rigth_ans" placeholder="{{$newLang->cor_ans}} ">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                                                                <input class="form-control my-2" type="text" name="ans_1" placeholder="{{$newLang->wrong_ans}}">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                                                                <input class="form-control my-2" type="text" name="ans_2" placeholder="{{$newLang->wrong_ans}} ">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                                                                <input class="form-control my-2" type="text" name="ans_3" placeholder="{{$newLang->wrong_ans}} ">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->add_ques}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 questions d-none" id="record">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('questions.recording')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3 row ">
                                                            <div class="form-group col-md-12 row">
                                                                <label class="col-form-label col-lg-12">{{$newLang->audio}}</label>
                                                                <div class="col-lg-12">
                                                                    <input type="file" name="record" class="form-control">
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">{{$newLang->level}}</label>
                                                                <select name="level" class="form-control">
                                                                    <option selected="">{{$newLang->select ." ". $newLang->level }}</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="alert alert-primary mx-auto my-3 " role="alert">
                                                                {{$newLang->can_question ." ".$newLang->audio}}
                                                            </div>
                                                            <div id="add_ques">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="button" id="add_question" class="btn btn-primary w-lg mt-2">{{$newLang->add_question}}</button>
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->add_ques}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 questions d-none" id="true_fase">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('questions.correction')}}" method="POST">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <div class="col-lg-12">
                                                                <label class="form-label mb-2">{{$newLang->Question}}</label>
                                                                <input class="form-control" name="true_fase" type="text" id="subject2" placeholder="{{$newLang->Question}}">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">{{$newLang->level}}</label>
                                                                <select name="level" class="form-control">
                                                                    <option selected="">{{$newLang->select ." ". $newLang->level }}</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">

                                                                <label class="form-label my-2">{{$newLang->rightWrong}}</label>
                                                                <select name="rigth_ans" class="form-control">
                                                                    <option selected="">{{$newLang->select ." ".$newLang->rightWrong}}</option>
                                                                    <option value="right">{{$newLang->cor_ans}} </option>
                                                                    <option value="wrong">{{$newLang->wrong_ans}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->add_ques}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 questions d-none" id="video">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('questions.vedio')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3 row ">
                                                            <div class="form-group col-md-12 row">
                                                                <label class="col-form-label col-lg-12">{{$newLang->vedio}}</label>
                                                                <div class="col-lg-12">
                                                                    <input type="file" name="video" class="form-control">
                                                                </div>
                                                            </div>



                                                            <div class="col-sm-12">
                                                                <label class="col-form-label my-2">{{$newLang->Question}}</label>
                                                                <select name="level" class="form-control m-0">
                                                                    <option selected="">{{$newLang->select ." ".$newLang->rightWrong}}</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="alert alert-primary mx-auto my-3 " role="alert">
                                                            {{$newLang->can_question ." ".$newLang->vedio}}

                                                            </div>
                                                            <div id="add_some_ques">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <button type="button" id="add_video" class="btn btn-primary w-lg mt-2">{{$newLang->add_question}}</button>
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->add_ques}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 questions d-none" id="reading">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('questions.reading')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <div class="col-ms-12">
                                                                <label class="form-label m-2">{{$newLang->reading}}</label>
                                                                <div class="mb-3">
                                                                    <textarea name="reading" class=" form-control" cols="145" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">{{$newLang->Question}}</label>
                                                                <select name="level" class=" form-control">
                                                                <option selected="">{{$newLang->select ." ".$newLang->rightWrong}}</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="alert alert-primary mx-auto my-3" role="alert">
                                                            {{$newLang->can_question ." ".$newLang->reading}}
                                                            </div>
                                                            <div id="add_reading_ques">
                                                            </div>
                                                            <div class="col-md-12">

                                                                <button type="button" id="add_reading" class="btn btn-primary w-lg mt-2">{{$newLang->add_question}}</button>
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">{{$newLang->add_ques}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>

        </div>
    </div>
</section>
@section('script')
<script>
    var countup = 1;
    var countup2 = 1;
    var countup3 = 1;

    var localPage = localStorage.getItem("type")
    if (localPage != null) {
        $('.questions').addClass('d-none')
        $('#' + localPage).removeClass('d-none');
        $('.nav-link').removeClass('active');
        var arr = $('.nav-link');
        for (var i = 0; i < arr.length; i++) {
            if (arr[i].getAttribute('data_questions') == localPage) {
                arr[i].classList.add("active")
            }
        }
    }
    $('ul .nav-link').on("click", function() {
        $(this).addClass('active').siblings().removeClass("active");
        $(".questions").addClass("d-none");
        var question = $(this).attr('data_questions');
        $('#' + question).removeClass('d-none');
        localStorage.setItem("type", question);

    });
    $('#add_question').on("click", function() {
        $("#add_ques").append(`<div class="row">
                <div class="btn btn-light col-sm-11 m-auto my-2" role="alert">
                {{$newLang->Question}} ${countup}
                </div>
                <div class="col-sm-12">
                    <label class="form-label mb-2">{{$newLang->Question}}</label>
                    <input class="form-control" name="question[]" type="text" id="subject2" placeholder="{{$newLang->Question}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->cor_ans}} <i class="fa fa-check"></i></label>
                    <input class="form-control my-2" type="text" name="rigth_ans[]" placeholder="{{$newLang->cor_ans}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_1[]" placeholder="{{$newLang->wrong_ans}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_2[]" placeholder="{{$newLang->wrong_ans}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_3[]" placeholder="{{$newLang->wrong_ans}}">
                </div>
            </div>`)
        countup++;
    });

    $('#add_video').on("click", function() {
        $("#add_some_ques").append(`<div class="row">
                <div class="btn btn-light col-sm-11 m-auto my-2" role="alert">
                {{$newLang->Question}} ${countup2}
                </div>
                <div class="col-sm-12">
                    <label class="form-label mb-2">{{$newLang->Question}}</label>
                    <input class="form-control" name="question[]" type="text" id="subject2" placeholder="{{$newLang->Question}} ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->cor_ans}} <i class="fa fa-check"></i></label>
                    <input class="form-control my-2" type="text" name="rigth_ans[]" placeholder="{{$newLang->cor_ans}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_1[]" placeholder="{{$newLang->wrong_ans}} ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_2[]" placeholder="{{$newLang->wrong_ans}} ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_3[]" placeholder="{{$newLang->wrong_ans}} ">
                </div>
            </div>`)
        countup2++;
    })

    $('#add_reading').on("click", function() {
        $("#add_reading_ques").append(`<div class="row">
                <div class="btn btn-light col-sm-11 m-auto my-2" role="alert">
                {{$newLang->Question}} ${countup3}
                </div>
                <div class="col-sm-12">
                    <label class="form-label mb-2">{{$newLang->Question}}</label>
                    <input class="form-control" name="question[]" type="text" id="subject2" placeholder="{{$newLang->Question}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->cor_ans}} <i class="fa fa-check"></i></label>
                    <input class="form-control my-2" type="text" name="rigth_ans[]" placeholder="{{$newLang->cor_ans}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}}<i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_1[]" placeholder="{{$newLang->wrong_ans}}">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_2[]" placeholder="{{$newLang->wrong_ans}} ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">{{$newLang->wrong_ans}} <i class="fa fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_3[]" placeholder="{{$newLang->wrong_ans}}">
                </div>
            </div>`)
        countup3++;
    })
</script>

@endsection
@endsection