@extends('layouts.layout')
@section('title')
subjects
@endsection
@section('styles')
<link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
<!-- DataTables -->
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .nav-link {
        cursor: pointer;
    }

    /* .dt-bootstrap4 .row:last-of-type>.col-md-5,
    .dt-bootstrap4 .row:last-of-type>.col-md-7 {
        display: none;
    } */
</style>
@endsection
@section('content')
<div class="container-fluid">
    @include('admin.inc.massage')

    <div class="row">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-link active" data_questions="choices">choices
                                            </li>
                                            <li class="nav-link" data_questions="record">audio
                                            </li>
                                            <li class="nav-link" data_questions="true_fase">right or wrong
                                            </li>
                                            <li class="nav-link" data_questions="video">video
                                            </li>
                                            <li class="nav-link" data_questions="reading">reading
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
                                                                <label class="form-label mb-2">Enter question</label>
                                                                <input class="form-control" name="choices" type="text" id="subject2" placeholder="wirte answer ">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">Enter level</label>
                                                                <select name="level" class="form-select">
                                                                    <option selected="">choices Level</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">correct answer <i class="fas fa-check"></i></label>
                                                                <input class="form-control my-2" type="text" name="rigth_ans" placeholder="correct answer">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                                                                <input class="form-control my-2" type="text" name="ans_1" placeholder="Wrong answer ">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                                                                <input class="form-control my-2" type="text" name="ans_2" placeholder="Wrong answer ">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                                                                <input class="form-control my-2" type="text" name="ans_3" placeholder="Wrong answer ">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 questions d-none" id="record">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('questions.recording')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control" name="record" id="inputGroupFile01">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">Enter level</label>
                                                                <select name="level" class="form-select">
                                                                    <option selected="">choices Level</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="alert alert-primary col-md-12 my-3" role="alert">
                                                                you can add some question on this record
                                                            </div>
                                                            <div id="add_ques">
                                                                <!-- <div>
                                                                    
                                                                    <div class="col-sm-12">
                                                                        <label class="form-label mb-2">Enter question</label>
                                                                        <input class="form-control" name="choices" type="text" id="subject2" placeholder="wirte answer ">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label my-2">correct answer <i class="fas fa-check"></i></label>
                                                                        <input class="form-control my-2" type="text" name="rigth_ans" placeholder="correct answer">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                                                                        <input class="form-control my-2" type="text" name="ans_1" placeholder="Wrong answer ">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                                                                        <input class="form-control my-2" type="text" name="ans_2" placeholder="Wrong answer ">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                                                                        <input class="form-control my-2" type="text" name="ans_3" placeholder="Wrong answer ">
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                            <button type="button" id="add_question" class="btn btn-primary w-lg mt-2">Add anther question</button>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">Submit</button>
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
                                                            <div class="col-sm-12">
                                                                <label class="form-label mb-2">Enter question</label>
                                                                <input class="form-control" name="true_fase" type="text" id="subject2" placeholder="wirte answer ">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">Enter level</label>
                                                                <select name="level" class="form-select">
                                                                    <option selected="">choices Level</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">right or wrong</label>
                                                                <select name="rigth_ans" class="form-select">
                                                                    <option selected="">choices right or wrong</option>
                                                                    <option value="right">right</option>
                                                                    <option value="wrong">wrong</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 questions d-none" id="video">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form action="{{route('questions.vedio')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <label class="form-label my-2">chose video</label>
                                                            <div class="input-group mb-3">

                                                                <input type="file" class="form-control" name="video" id="inputGroupFile01">
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">Enter level</label>
                                                                <select name="level" class="form-select">
                                                                    <option selected="">choices Level</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="alert alert-primary col-md-12 my-3" role="alert">
                                                                you can add some question on this vedio
                                                            </div>
                                                            <div id="add_some_ques">
                                                            </div>
                                                            <button type="button" id="add_video" class="btn btn-primary w-lg mt-2">Add anther question</button>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">Submit</button>
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
                                                            <label class="form-label my-2">reading</label>
                                                            <div class="mb-3">
                                                                <textarea name="reading" class="form-select" cols="30" rows="10"></textarea>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="form-label my-2">Enter level</label>
                                                                <select name="level" class="form-select">
                                                                    <option selected="">choices Level</option>
                                                                    @foreach($levels as $level)
                                                                    <option value="{{$level->id}}">{{$level->lavel_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="alert alert-primary col-md-12 my-3" role="alert">
                                                                you can add some question on this vedio
                                                            </div>
                                                            <div id="add_reading_ques">
                                                            </div>
                                                            <button type="button" id="add_reading" class="btn btn-primary w-lg mt-2">Add anther question</button>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-lg mt-2">Submit</button>
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
            </div>
            <!-- end col -->
        </div>

    </div>
    @section('script')
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
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
                <div class="btn btn-light col-sm-12 my-2" role="alert">
                    Question ${countup}
                </div>
                <div class="col-sm-12">
                    <label class="form-label mb-2">Enter question</label>
                    <input class="form-control" name="question[]" type="text" id="subject2" placeholder="wirte answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">correct answer <i class="fas fa-check"></i></label>
                    <input class="form-control my-2" type="text" name="rigth_ans[]" placeholder="correct answer">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_1[]" placeholder="Wrong answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_2[]" placeholder="Wrong answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_3[]" placeholder="Wrong answer ">
                </div>
            </div>`)
            countup++;
        });

        $('#add_video').on("click", function() {
            $("#add_some_ques").append(`<div class="row">
                <div class="btn btn-light col-sm-12 my-2" role="alert">
                    Question ${countup2}
                </div>
                <div class="col-sm-12">
                    <label class="form-label mb-2">Enter question</label>
                    <input class="form-control" name="question[]" type="text" id="subject2" placeholder="wirte answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">correct answer <i class="fas fa-check"></i></label>
                    <input class="form-control my-2" type="text" name="rigth_ans[]" placeholder="correct answer">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_1[]" placeholder="Wrong answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_2[]" placeholder="Wrong answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_3[]" placeholder="Wrong answer ">
                </div>
            </div>`)
            countup2++;
        })

        $('#add_reading').on("click", function() {
            $("#add_reading_ques").append(`<div class="row">
                <div class="btn btn-light col-sm-12 my-2" role="alert">
                    Question ${countup3}
                </div>
                <div class="col-sm-12">
                    <label class="form-label mb-2">Enter question</label>
                    <input class="form-control" name="question[]" type="text" id="subject2" placeholder="wirte answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">correct answer <i class="fas fa-check"></i></label>
                    <input class="form-control my-2" type="text" name="rigth_ans[]" placeholder="correct answer">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_1[]" placeholder="Wrong answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_2[]" placeholder="Wrong answer ">
                </div>
                <div class="col-sm-6">
                    <label class="form-label my-2">Wrong answer <i class="fas fa-times"></i></label>
                    <input class="form-control my-2" type="text" name="ans_3[]" placeholder="Wrong answer ">
                </div>
            </div>`)
            countup3++;
        })
    </script>
    @endsection
    @endsection