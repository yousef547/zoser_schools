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

    .message-user {
        border: 1px solid #999999;
        display: inline-block;
        padding: 4px;
        padding-right: 8px;
        border-radius: 10px;
        margin: 5px;
        margin-top: 0px;
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
                        <!-- ngIf: userRole == 'admin' -->
                        <h4 class="card-title ">Send Message</h4>
                        <div class="form">

                            <form class="form-horizontal " action="{{url('admin/chat/submit')}}" method="post">
                                @csrf
                                <div class="form-group row" ng-class="{'has-error': sendMessage.toId.$invalid}">
                                    <label class="col-sm-2 text-right control-label col-form-label ng-binding">Send message to (username) </label>
                                    <div class="col-sm-10 row">
                                        <div class="mb-3 text-end">
                                            <label for="example-password-input1" class="form-label"> </label>
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-animation="bounce" data-bs-target=".bs-example-modal-center">search users</button>
                                            <div id="hostUser" class="d-none text-start">
                                                <div class="message-user">
                                                    <img src="kjkljk" alt="user" id="user_img" style="width:35px;height: 35px;" class="img-circle">
                                                    <a class=" name_host" href="" id="n_host">
                                                        yousef mohamed
                                                    </a>
                                                    <input type="text" class="form-control mt-2" name="" hidden>
                                                </div>
                                                <input type="number" class="form-control mt-2" name="id" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 text-right control-label col-form-label">Message </label>
                                    <div class="col-sm-10">
                                        <textarea name="messageText" class="form-control" placeholder="Message" style="height:250px"></textarea>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Send Message</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
    </div>

</div>


<div class="modal fade bs-example-modal-center show" id="models" tabindex="-1" aria-labelledby="mySmallModalLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title align-self-center" id="exampleModalLabel">Select users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row ">
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="searchLink" placeholder=" / username /" onkeyup="myfilters(this.value)">
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger btn-flat  w-100">Search</button>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12" style="padding-top:10px;">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered">
                                <tbody id="setUsers">
                                    <!-- ngRepeat: studentOne in searchResults -->


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
    var idUser = <?php echo($user)?> ;
    // console.log(idUser);
    function createInput(name, img, id) {
        console.log(img);
        $('#hostUser').removeClass('d-none');
        $("#user_img").attr('src', "{{asset('uploads/')}}/" + img);
        $('#hostUser input[type="text"]').val(name);
        $('#hostUser input[type="number"]').val(id)
        $('#n_host').text(name);
    }

    function myfilters(text) {
        $.get("/admin/meeting/filter?filter[username]=" + text, function(data, status) {
            var allUser = ``;
            var users = data.data;
            for (var i = 0; i < users.length; i++) {
                if(idUser == users[i].id){
                    continue;
                } else {
                    allUser += ` <tr>
                                <td class="ng-binding" style="width: 35%;">${users[i].username}</td>
                                <td class="ng-binding" style="width: 35%;">${users[i].email}</td>
                                <td class="no-print" style="width: 30%;">
                                    <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal" onclick="createInput('${users[i].username}','${users[i].photo}','${users[i].id}')">Select</button>
                                </td>
                            </tr>`;
                }
             
            }
            document.getElementById('setUsers').innerHTML = allUser;
        });
    }
</script>

@endsection
@endsection