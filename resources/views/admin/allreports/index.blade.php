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

    .round {
        line-height: 45px;
        color: #fff;
        width: 45px;
        height: 45px;
        display: inline-block;
        font-weight: 400;
        text-align: center;
        border-radius: 100%;
        background: #3c763d;
    }
    .card-block > a {
        padding:15px
    }
    .m-l-10 {
        margin: 10px 0 0 10px
    }
    .fa-2x {
        margin-top:11px
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    @include('admin.inc.massage')

    <div id="parentDBArea" ng-view="" class="ng-scope">
        <div class="row page-titles ng-scope">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0 ng-binding">{{$newLang->Reports}}</h3>
            </div>
           
        </div>

        <div class="row ng-scope" ng-show="views.list">

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <a href="{{route('reports.user')}}" class="d-flex flex-row " style="cursor:pointer;" >
                            <div class="round align-self-center round-success reports_flex"><i class="fas fa-tachometer-alt fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->UsersStats}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="stdAttendance()">
                            <div class="round align-self-center round-success reports_flex"><i class="fas fa-chart-bar fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->studentAttendance}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('stfAttendance')">
                            <div class="round align-self-center round-success reports_flex"><i class="fa fa-check fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->staffAttendance}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('paymentsReports')">
                            <div class="round align-self-center round-success reports_flex"><i class="fas fa-dollar-sign fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->paymentsReports}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('invoiceGeneration')">
                            <div class="round align-self-center round-success reports_flex"><i class="fas fa-dollar-sign fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->invoiceGeneration}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('collectionReports')">
                            <div class="round align-self-center round-success reports_flex"><i class="fas fa-dollar-sign fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->collectionRepoorts}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('payRollReports')">
                            <div class="round align-self-center round-success reports_flex"><i class="mdi mdi-bank fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->payrollReports}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('incomeReports')">
                            <div class="round align-self-center round-success reports_flex"><i class="fas fa-money-bill fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->incomeReports}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('expensesReports')">
                            <div class="round align-self-center round-success reports_flex"><i class="fas fa-dollar-sign fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->expensesReports}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('stVacation')">
                            <div class="round align-self-center round-success reports_flex"><i class="fa fa-coffee fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->studentVacation}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="changeView('teacherVacation')">
                            <div class="round align-self-center round-success reports_flex"><i class="fa fa-coffee fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->teacherVacation}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="marksheetGenerationPrepare()">
                            <div class="round align-self-center round-success reports_flex"><i class="fa fa-table fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->marksheetGen}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="biometricUsers()">
                            <div class="round align-self-center round-success reports_flex"><i class="mdi mdi-fingerprint fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->bioUsers}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="genCertPrep()">
                            <div class="round align-self-center round-success reports_flex"><i class="mdi mdi-certificate fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->gen_cert}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-block">
                        <div class="d-flex flex-row" style="cursor:pointer;" ng-click="genCardsPrep()">
                            <div class="round align-self-center round-success reports_flex"><i class="mdi mdi-certificate fa-2x"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="text-muted m-b-0 ng-binding">{{$newLang->gen_idcard}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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

</script>

@endsection
@endsection