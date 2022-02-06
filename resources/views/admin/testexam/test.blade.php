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


<style>
    .dataTables_length {
        display: none;
    }

    .badge {
        right: -10px !important;
    }

    /* RemixDesign | woaichidapi@163.com | Redesigned by JimmyCheung */

    .audioplayer {
        display: flex;
        flex-direction: row;
        box-sizing: border-box;
        margin: 1em 0;
        padding: 0 24px;
        width: 100%;
        height: 96px;
        align-items: center;
        border: 1px solid #DDE2E6;
        border-radius: 4px;
        background: #fff;
    }

    .audioplayer-playpause {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        cursor: pointer;
        transition: all .2s ease-in-out;
    }

    .audioplayer:not(.audioplayer-playing) .audioplayer-playpause {
        background: rgba(91, 130, 255, 0);
        border: 1px solid #5B82FF;
    }

    .audioplayer:not(.audioplayer-playing) .audioplayer-playpause:hover {
        background: rgba(91, 130, 255, 0.1);
    }

    .audioplayer-playing .audioplayer-playpause {
        background: rgba(253, 79, 26, 0);
        border: 1px solid #FD4F1A;
    }

    .audioplayer-playing .audioplayer-playpause:hover {
        background: rgba(235, 79, 26, 0.1);
    }

    .audioplayer:not(.audioplayer-playing) .audioplayer-playpause a {
        content: '';
        justify-content: center;
        width: 0;
        height: 0;
        margin-left: 2px;
        border-top: 7px solid transparent;
        border-right: none;
        border-bottom: 7px solid transparent;
        border-left: 12px solid #0059FF;
    }

    .audioplayer-playing .audioplayer-playpause a {
        content: '';
        display: flex;
        justify-content: space-between;
        width: 12px;
        height: 14px;
    }

    .audioplayer-playing .audioplayer-playpause a::before,
    .audioplayer-playing .audioplayer-playpause a::after {
        content: '';
        width: 4px;
        height: 14px;
        background-color: #FD4F1A;
    }

    .audioplayer-time {
        display: flex;
        width: 40px;
        justify-content: center;
        font-size: 12px;
        color: rgba(51, 51, 51, .6)
    }

    .audioplayer-time-current {
        margin-left: 24px;
    }

    .audioplayer-time-duration {
        margin-right: 24px;
    }

    .audioplayer-bar {
        position: relative;
        display: flex;
        margin: 0 12px;
        height: 12px;
        flex-basis: 0;
        flex-grow: 1;
        cursor: pointer;
    }

    .audioplayer-bar::before {
        content: '';
        position: absolute;
        top: 5px;
        width: 100%;
        height: 2px;
        background-color: #DDE2E6;
    }

    .audioplayer-bar>div {
        position: absolute;
        left: 0;
        top: 5px;
    }

    .audioplayer-bar-loaded {
        z-index: 1;
        height: 2px;
        background: #BEC8D2;
    }

    .audioplayer-bar-played {
        flex-direction: row-reverse;
        z-index: 2;
        height: 2px;
        background: -webkit-linear-gradient(left, #0059FF, #09B1FA);
    }

    .audioplayer-bar-played::after {
        display: flex;
        position: absolute;
        content: '';
        box-sizing: border-box;
        top: -5px;
        right: -1px;
        margin-right: -5px;
        width: 12px;
        height: 12px;
        background-color: #fff;
        border-radius: 6px;
    }

    .audioplayer:not(.audioplayer-playing) .audioplayer-bar-played::after {
        border: 2px solid #BEC8D2;
    }

    .audioplayer-playing .audioplayer-bar-played::after {
        border: 2px solid #0059FF;

    }

    .audioplayer-volume {
        display: flex;
        align-items: center;
    }

    .audioplayer-volume-button {
        display: flex;
        align-items: center;
        width: 24px;
        height: 24px;
        cursor: pointer;
    }

    .audioplayer-volume-button a {
        display: flex;
        width: 6px;
        height: 8px;
        background-color: #9A9FB0;
        position: relative;
    }

    .audioplayer-volume-button a:before,
    .audioplayer-volume-button a:after {
        content: '';
        position: absolute;
    }

    .audioplayer-volume-button a:before {
        width: 0;
        height: 0;
        border-top: 8px solid transparent;
        border-right: 9px solid #9A9FB0;
        border-bottom: 8px solid transparent;
        border-left: none;
        top: -4px;
    }

    .audioplayer:not(.audioplayer-mute) .audioplayer-volume-button a:after {
        left: 10px;
        top: -2px;
        width: 6px;
        height: 6px;
        border: 6px double #9A9FB0;
        border-width: 6px 6px 0 0;
        border-radius: 0 12px 0 0;
        transform: rotate(45deg);
    }

    .audioplayer-mute .audioplayer-volume-button a {
        background-color: #FD4F1A;
    }

    .audioplayer-mute .audioplayer-volume-button a:before {
        border-right: 9px solid #FD4F1A;
    }

    .audioplayer-volume-adjust {
        display: flex;
        align-items: center;
        margin-left: 8px;
    }

    .audioplayer-volume-adjust>div {
        position: relative;
        display: flex;
        width: 60px;
        height: 2px;
        cursor: pointer;
        background-color: #BEC8D2;
    }

    .audioplayer-volume-adjust div div {
        position: absolute;
        top: 0;
        left: 0;
        height: 2px;
        background-color: #0059FF;
    }

    /* responsive | you can change the max-width value to match your theme */

    @media screen and (max-width: 679px) {
        .audioplayer-volume-adjust {
            display: none;
        }
    }

    /* .dt-bootstrap4 .row:last-of-type>.col-md-5,
        .dt-bootstrap4 .row:last-of-type>.col-md-7 {
            display: none;
        } */
</style>
@endsection
@section('content')

<section class="content">
    @include('admin.inc.massage')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="box-header ">
                        <h3 class="box-title">{{$newLang->Questions}}</h3>
                    </div>
                    <div class="">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <form action="{{route('testexam.submit')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id_exam" value="{{$id}}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        @php $counter = 0 @endphp
                                        @foreach($questions as $key=>$question)
                                        @if($question->type == "choices")
                                        <div class="row">
                                            @php
                                            $var1 = $question->random()
                                            @endphp
                                            <div class="col-md-12">
                                                <h3> <span class="badge bg-secondary"> {{$newLang->Choose_right}}
                                                    </span></h3>

                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <button type="button" class="btn btn-primary position-relative">
                                                    {{$newLang->Question}}
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{$key + 1}}

                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="alert bg-primary" role="alert">
                                                    {{$question->choices}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info " role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var1[0]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var1[0]}}">
                                                        <label class="form-check-label" for="{{$var1[0]}}">{{$var1[0]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var1[1]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var1[1]}}">
                                                        <label class="form-check-label" for="{{$var1[1]}}">{{$var1[1]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var1[2]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var1[2]}}">
                                                        <label class="form-check-label" for="{{$var1[2]}}">{{$var1[2]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var1[3]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var1[3]}}">
                                                        <label class="form-check-label" for="{{$var1[3]}}">{{$var1[3]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        @php $counter++ @endphp
                                        @elseif($question->type == "true_fase")
                                        <h3> <span class="badge bg-secondary">{{$newLang->rightWrong}} </span></h3>
                                        <div class="row">
                                            <div class="col-md-2 mt-2">
                                                <button type="button" class="btn btn-primary position-relative">
                                                    {{$newLang->Question}}
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{$key + 1}}

                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="alert bg-primary" role="alert">
                                                    {{$question->true_fase}}
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="alert alert-info " role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="right_{{$counter}}" name="answer[{{$counter}}]" class="form-check-input" value="right">
                                                        <label class="form-check-label" for="right_{{$counter}}">{{$newLang->cor_ans}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info " role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="wrong_{{$counter}}" name="answer[{{$counter}}]" class="form-check-input" value="wrong">
                                                        <label class="form-check-label" for="wrong_{{$counter}}">{{$newLang->wrong_ans}}</label>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <hr>
                                        @php $counter++ @endphp
                                        @elseif($question->type == "record")


                                        <h3> <span class="badge bg-secondary">{{$newLang->listenAudio}}</span></h3>
                                        <div class="col-md-2 mt-2">
                                            <button type="button" class="btn btn-primary position-relative">
                                                {{$newLang->Question}}
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{$key + 1}}
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-md-12">
                                            <div id="wrapper">
                                                <audio preload="auto" controls>
                                                    <source src='{{asset("uploads/$question->record")}}'>
                                                </audio>
                                            </div>
                                        </div>
                                        <div class="col-md-10 row m-auto">
                                            @foreach($question->info as $key=>$answer)
                                            @php
                                            $var2 = $answer->random();
                                            @endphp
                                            <div class="col-md-2 mt-2">
                                                <button type="button" class="btn btn-primary position-relative">
                                                    {{$newLang->Question}}
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{$key + 1}}

                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="alert bg-primary" role="alert">
                                                    {{$answer->question}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info " role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var2[0]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var2[0]}}">
                                                        <label class="form-check-label" for="{{$var2[0]}}">{{$var2[0]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var2[1]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var2[1]}}">
                                                        <label class="form-check-label" for="{{$var2[1]}}">{{$var2[1]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var2[2]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var2[2]}}">
                                                        <label class="form-check-label" for="{{$var2[2]}}">{{$var2[2]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var2[3]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var2[3]}}">
                                                        <label class="form-check-label" for="{{$var2[3]}}">{{$var2[3]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @php $counter++ @endphp
                                            @endforeach
                                        </div>
                                        <hr>

                                        @elseif($question->type == "video")
                                        <h3> <span class="badge bg-secondary">{{$newLang->watchVedio}}</span></h3>
                                        <div class="col-md-2 mt-2">
                                            <button type="button" class="btn btn-primary position-relative">
                                                {{$newLang->Question}}
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                    {{$key + 1}}
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-md-12 my-3">
                                            <video width="100%" height="240" controls>
                                                <source src='{{asset("uploads/$question->video")}}' type="video/mp4">
                                                <source src='{{asset("uploads/$question->video")}}' type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                        <div class="col-md-10 row m-auto">
                                            @foreach($question->info as $key=>$answer)
                                            @php
                                            $var3 = $answer->random();
                                            @endphp
                                            <div class="col-md-2 mt-2">
                                                <button type="button" class="btn btn-primary position-relative">
                                                    {{$newLang->Question}}
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{$key + 1}}

                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="alert bg-primary" role="alert">
                                                    {{$answer->question}}
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info " role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var3[0]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var3[0]}}">
                                                        <label class="form-check-label" for="{{$var3[0]}}">{{$var3[0]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var3[1]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var3[1]}}">
                                                        <label class="form-check-label" for="{{$var3[1]}}">{{$var3[1]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var3[2]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var3[2]}}">
                                                        <label class="form-check-label" for="{{$var3[2]}}">{{$var3[2]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="alert alert-info" role="alert">
                                                    <div class="form-check my-2">
                                                        <input type="radio" id="{{$var3[3]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var3[3]}}">
                                                        <label class="form-check-label" for="{{$var3[3]}}">{{$var3[3]}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @php $counter++ @endphp
                                            @endforeach
                                        </div>
                                        @elseif($question->type == "reading")
                                        <h3> <span class="badge bg-secondary">{{$newLang->Read_solve}}</span></h3>
                                        <div class="row">
                                            <div class="col-md-2 mt-2">
                                                <button type="button" class="btn btn-primary position-relative">
                                                    {{$newLang->Question}}
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        {{$key + 1}}

                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <div class="alert alert-primary" role="alert">
                                                    {{$question->reading}}
                                                </div>
                                            </div>
                                            <div class="col-md-10 row m-auto">
                                                @foreach($question->info as $key=>$answer)
                                                @php
                                                $var4 = $answer->random();
                                                @endphp
                                                <div class="col-md-2 mt-2">
                                                    <button type="button" class="btn btn-primary position-relative">
                                                        {{$newLang->Question}}
                                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                            {{$key + 1}}

                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <div class="alert bg-primary" role="alert">
                                                        {{$answer->question}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="alert alert-info " role="alert">
                                                        <div class="form-check my-2">
                                                            <input type="radio" id="{{$var4[0]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var4[0]}}">
                                                            <label class="form-check-label" for="{{$var4[0]}}">{{$var4[0]}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="alert alert-info" role="alert">
                                                        <div class="form-check my-2">
                                                            <input type="radio" id="{{$var4[1]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var4[1]}}">
                                                            <label class="form-check-label" for="{{$var4[1]}}">{{$var4[1]}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="alert alert-info" role="alert">
                                                        <div class="form-check my-2">
                                                            <input type="radio" id="{{$var4[2]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var4[2]}}">
                                                            <label class="form-check-label" for="{{$var4[2]}}">{{$var4[2]}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="alert alert-info" role="alert">
                                                        <div class="form-check my-2">
                                                            <input type="radio" id="{{$var4[3]}}" name="answer[{{$counter}}]" class="form-check-input" value="{{$var4[3]}}">
                                                            <label class="form-check-label" for="{{$var4[3]}}">{{$var4[3]}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @php $counter++ @endphp
                                                @endforeach
                                            </div>
                                            <hr>
                                        </div>
                                        @endif
                                        @endforeach
                                        <!-- <audio preload="auto" controls>
                                            <source src=' {{asset("uploads/record/pwyFRYE6O2TpvxV8fxRcpc7zSPhPL3VH3E77eFOw.mp3")}}'>
                                                </audio> -->
                                    </div>
                                </div>

                        </div>
                        <button type="submit" class="btn btn-primary w-lg mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    </div>
</section>

@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="{{asset('assets/js/audioplayer.js')}}"></script>
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
    $(function() {
        $('audio').audioPlayer();
    });
</script>


@endsection
@endsection