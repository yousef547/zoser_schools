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
    .name_host {
        border: 1px solid #ccc;
        padding: 12px;
        font-size: 15px;
        border-radius: 4px;
        margin-top: 5px;
    }

    .centers {
        text-align: center;
        padding-top: 30px !important;
    }

    .datas {

        background: #ddd;
        position: absolute;
        bottom: 50px;
        right: -11px;

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
                <h4 class="mb-0 font-size-18">{{$newLang->attReport}}</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div>
                        <div class="card-block">
                            <h4 class="card-title ">{{$newLang->controlAttendance}}</h4>
                            <div class="form table-responsive">

                                <div style="padding:  10px;text-align:  center;font-weight: bold;" class="ng-binding">
                                 {{$newLang->class.":".$clsse}}
                                    <br>
                                    P : {{$newLang->Present}} - A : {{$newLang->Absent}} - L : {{$newLang->Late}} - E : {{$newLang->LateExecuse}}- D : {{$newLang->earlyDismissal}}
                                </div>

                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th class="ng-binding">{{$newLang->studentName}}</th>
                                            <th colspan="5" class="ng-binding">{{$newLang->percent}}</th>
                                            <th>{{$newLang->details}}</th>
                                        </tr>
                                        <tr>
                                            <td style="width: 10px"></td>
                                            <td></td>
                                            <td class="att_perc">
                                                <span tooltip="" data-original-title="Present">%P</span>
                                            </td>
                                            <td class="att_perc">
                                                <span tooltip="" data-original-title="Absent">%A</span>
                                            </td>
                                            <td class="att_perc">
                                                <span tooltip="" data-original-title="Late">%L</span>
                                            </td>
                                            <td class="att_perc">
                                                <span tooltip="" data-original-title="Late with excuse">%E</span>
                                            </td>
                                            <td class="att_perc">
                                                <span tooltip="" data-original-title="Early Dismissal">%D</span>
                                            </td>

                                            @foreach($dates as $date)

                                            <!-- ngRepeat: range_one in date_range -->
                                            <td style="text-align: center;">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{\Carbon\Carbon::parse($date)->format('y/m/d')}}" class="ng-binding">{{\Carbon\Carbon::parse($date)->format('d')}}</span>
                                            </td><!-- end ngRepeat: range_one in date_range -->

                                            @endforeach
                                        </tr>
                                        @foreach($infos as $key => $info)
                                        <p></p>
                                        <tr>
                                            <td class="ng-binding"></td>
                                            <td style="white-space: nowrap;">
                                                <img class="user-image img-circle" style="width:35px; height:35px;" src='{{asset("uploads/")}}/{{$info["username"]->photo}}'>
                                                <a>{{$info['username']->username}}</a>
                                            </td>
                                            <td class="att_perc ng-binding">{{$info['present']}}%</td>
                                            <td class="att_perc ng-binding">{{$info['absent']}}%</td>
                                            <td class="att_perc ng-binding">{{$info['Late']}}%</td>
                                            <td class="att_perc ng-binding">{{$info['Late_with_xcuse']}}%</td>
                                            <td class="att_perc ng-binding">{{$info['Early_Dismissal']}}%</td>
                                            @for($i=0; $i < count($dates); $i++) <td class="att_perc ng-binding">
                                                @for($y = 0;$y < count($infos[$key]['attendance']);$y++) @if(\Carbon\Carbon::parse($dates[$i])->timestamp == $info['attendance'][$y]->date)
                                                    @switch($info['attendance'][$y]->status)
                                                    @case("Present")
                                                    {{$newLang->Present}}
                                                    @break
                                                    @case("absent")
                                                    {{$newLang->Absent}}
                                                    @break
                                                    @case("late")
                                                    {{$newLang->Late}}
                                                    @break
                                                    @case("late_with_excuse")
                                                    {{$newLang->LateExecuse}}
                                                    @break
                                                    @case("early_dismissal")
                                                    {{$newLang->earlyDismissal}}
                                                    @break
                                                    @endswitch

                                                    @endif
                                                    @endfor
                                                    </td>
                                                    @endfor
                                        </tr><!-- end ngRepeat: student in students | object2Array -->
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>

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
<script src="{{asset('assets/libs/tippy.js/tippy.all.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tooltipster.init.js')}}"></script>



<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/js/intlTelInput.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="{{asset('assets/js/intlTelInput-jquery.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<script>

</script>
@endsection
@endsection