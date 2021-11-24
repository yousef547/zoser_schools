@extends('layouts.layout')
@section('title')
HomePage
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
    .slimScrollDiv {
        overflow-y: scroll;
    }

    .centers {
        text-align: center;
        padding-top: 30px !important;
    }

    .name {
        padding: 0 109px;
        /* padding-bottom: -9px; */
        margin-bottom: 2px;
        color: #80888f;
    }

    .form-group {
        margin: 15px 0;
    }

    .flexs {
        display: flex;
        justify-content: end;
    }

    .light {
        color: #9ba1a8;
    }

    .header-profile-mag {
        height: 60px;
        width: 60px;
    }

    .fonts {
        font-size: 20px !important;
        font-weight: 600 !important;
    }

    .msg,
    .msg2 {
        border-radius: 20px;
        padding: 10px;
        font-size: 16px;
        font-weight: 500;
    }

    .msg {
        background: rgb(68 162 210 / 50%);
    }

    .msg2 {
        background: rgb(148 238 196 / 50%)
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Messages</h4>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-body">
                    <div class="card-block">
                        <h4 class="card-title ng-binding">{{$nameUser->username}}</h4>
                        <div class="chat-box">
                            <!--chat Row -->
                            <div class="slimScrollDiv" id="scrolling" style=" height: 500px;">
                                <div class="col-12 pe-4" id="mssg">
                                    @foreach($messages as $message)
                                    @if(Auth::user()->id == $message->from_user)
                                    <div class="row my-3">
                                        <p class=" name">{{$message->useFrom}}</p>
                                        <div class="col-1">
                                            <img class="rounded-circle header-profile-mag" src="{{asset('uploads/')}}/{{$message->photoFrom}}" alt="Header Avatar">
                                        </div>
                                        <div class="col-11 msg">
                                            <p>{{$message->messageText}}</p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row my-3">
                                        <p class="text-end name">{{$message->useFrom}}</p>
                                        <div class="col-11 msg2 text-end">
                                            <p>{{$message->messageText}}</p>
                                        </div>
                                        <div class="col-1">
                                            <img class="rounded-circle header-profile-mag" src="{{asset('uploads/')}}/{{$message->photoFrom}}" alt="Header Avatar">
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach


                                </div>
                                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 500px;"></div>
                                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-block b-t">
                        <div class="row">
                            <div class="col-11">
                                <textarea id="massage" class="form-control  b-0 ng-pristine ng-valid" placeholder="Type reply ( press enter to submit ) ..."></textarea>
                            </div>
                            <input type="hidden" id="id_chat" value="{{$id_chat}}">
                            <input type="hidden" id="id_user" value="{{$to_user}}">
                            <div class="col-1 text-right">
                                <button type="button" id='btn' onclick="sendMessage()" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

</div>

@section('script')
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<!-- <script src="{{asset('assets/js/intlTelInput.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{asset('assets/js/intlTelInput-jquery.min.js')}}"></script> -->


<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>


<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script>
    var idUse = <?php

                use Illuminate\Support\Facades\Auth;

                echo (Auth::user()->id) ?>,

        msgImg = "<?php echo (Auth::user()->photo) ?>"

    msgName = "<?php echo (Auth::user()->username); ?>"

    var scroll = document.getElementById('scrolling');

    function scrollFunction() {
        scroll.scrollTo(0, scroll.scrollHeight);
    }
    scrollFunction()


    function sendMessage() {
        var msg = $('#massage').val(),
            idUser = $('#id_user').val(),
            idChat = $('#id_chat').val();
        // msg.value = '';
        console.log(idUser);
        var send = {
            'id_from': idUse,
            'id_chat': idChat,
            'msg': msg,
            'id_to': idUser
        }
        // console.log(send);
        $.post("/api/chat/setmessage", send, function(data, status) {
            console.log(data);
            var newMsg = ` <div class="row my-3">
                                        <p class=" name">${msgName}</p>
                                        <div class="col-1">
                                            <img class="rounded-circle header-profile-mag" src="{{asset('uploads')}}/${msgImg}" alt="Header Avatar">
                                        </div>
                                        <div class="col-11 msg">
                                            <p>${data.messageText}</p>
                                        </div>
                                    </div>`
            $('#mssg').append(newMsg);
            scroll.scrollTo(0, scroll.scrollHeight);
        });
        $('#massage').val('');
        // api/chat/setmessage
    }

    var input = document.getElementById("massage");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            sendMessage();
        }
    });
</script>

@endsection
@endsection