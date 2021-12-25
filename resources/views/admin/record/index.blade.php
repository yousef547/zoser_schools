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
    .centers {
        text-align: center;
        padding-top: 30px !important;
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

    .fonts {
        font-size: 20px !important;
        font-weight: 600 !important;
    }
</style>
@endsection
@section('content')

<div class="container-fluid">
    @include('admin.inc.massage')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Parent</h4>
            </div>
        </div>
        <button onclick="startRecording(this);">record</button>
            <button onclick="stopRecording(this);" disabled>stop</button>
        <!-- <form action="{{url('admin/record/send')}}" method="GET" enctype='multipart/form-data'>
            @csrf
            
            inserting these scripts at the end to be able to use all the elements in the DOM 

        </form> -->

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
<!-- <script src="https://cdn.rawgit.com/mattdiamond/Recorderjs/08e7abd9/dist/recorder.js"></script>-->
<script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script>
    function captureMicrophone(callback) {
        navigator.mediaDevices.getUserMedia({
            audio: true
        }).then(callback).catch(function(error) {
            alert('Unable to access your microphone.');
            console.error(error);
        });
    }

    var recorder;

    //on click of a button representing microphone
    $('#inputFields').on('click', '*[class*=microphoneBtn]', function() {
        var audio = $('$audio'); //this refers to an HTML audio element
        var button = this;

        if (recorder == null || recorder.state === 'stopped') { //start recording
            captureMicrophone(function(microphone) {
                setSrcObject(microphone, audio);
                audio.muted = true;
                audio.play();

                recorder = RecordRTC(microphone, {
                    type: 'audio',
                    recorderType: StereoAudioRecorder,
                    desiredSampRate: 16000
                });
                recorder.startRecording();
                recorder.microphone = microphone;
            })
        } else { //stop recording
            recorder.stopRecording(function() {
                var blob = this.getBlob(); //get actual blob file
                audio.src = URL.createObjectURL(blob); //set src of audio element    
                audio.muted = false;
                audio.play();
                recorder.microphone.stop();
            });
        }

    });


    $('#inputFields').on('click', '*[class*=saveBtn]', function() {
        var blob = recorder.getBlob();
        var formdata = new FormData();
        formdata.append('audio-blob', blob);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(data) {
                //success message           
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                //error message 
            }
        });

    });
</script>




@endsection
@endsection