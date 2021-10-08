@extends('layouts.layout')
@section('title')
Visitors
@endsection

@section('contect')
<div id="parentDBArea" ng-view="" class="ng-scope">
    <div class="row page-titles no-print ng-scope">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0 ng-binding">Visitors</h3>
        </div>
        <div class="col-md-6 col-4 align-self-center">

        </div>
    </div>

    <div class="row ng-scope">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <div  class="pull-right card-block-input-group card-block-input-item">
                        <div class="btn-group no-print">
                            <button type="button" class="btn btn-success btn-flat ng-binding">Export</button>
                            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only ng-binding">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item ng-binding" href="index.php/visitors/export/excel">Export to Excel</a>
                                <a class="dropdown-item ng-binding" href="index.php/visitors/export/pdf" target="_BLANK">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                    <button  ng-click="changeView('add')" class="btn pull-right btn-success card-block-input-item ng-binding">Add Visitor</button>
                    <div class="pull-right card-block-input-group card-block-input-item">
                        <div class="input-group input-group-sm">
                            <input type="text" name="table_search" ng-model="searchText" placeholder="Search" ng-change="searchDB()" class="form-control input-sm ng-pristine ng-valid">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <h4 class="card-title ng-binding">List Visitors</h4>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="ng-binding">Pass ID</th>
                                    <th class="ng-binding">Visitor</th>
                                    <th class="ng-binding">ID/Passport #</th>
                                    <th class="ng-binding">User Type</th>
                                    <th class="ng-binding">To Meet</th>
                                    <th class="ng-binding">Purpose</th>
                                    <th class="ng-binding">Check In</th>
                                    <th class="ng-binding">Check Out</th>
                                    <th style="width:160px;" class="ng-binding">Operations</th>
                                </tr>
                                <!-- ngRepeat: visitors_one in visitors | itemsPerPage:20 -->
                                <tr  total-items="totalItems"  class="ng-scope">
                                    <td>
                                        <a  href="portal#/visitors/2" class="ng-binding">123</a>
                                        <span  class="ng-binding ng-hide">123</span>
                                    </td>
                                    <td class="ng-binding">
                                        yousef
                                        <span  class="ng-binding">+20 115 070 5993</span>
                                        <span class="ng-binding">youaefmhamed481@gmail.com</span>
                                    </td>
                                    <td class="ng-binding">22365</td>
                                    <td>
                                        <span >
                                            <!-- ngSwitchWhen: parent --><span  class="ng-binding ng-scope">Parent</span>
                                            <!-- ngSwitchWhen: company -->
                                        </span>
                                        <!-- ngRepeat: userOne in visitors_one.student -->
                                        <span  class="ng-binding ng-hide"><br></span>
                                    </td>
                                    <td>
                                        <!-- ngRepeat: userOne in visitors_one.to_meet -->
                                    </td>
                                    <td class="ng-binding">Asking about a student's level</td>
                                    <td class="ng-binding">29/09/2021 3:10 PM</td>
                                    <td>
                                        <span ng-show="visitors_one.check_out.date != '' &amp;&amp; visitors_one.check_out.hour != '' &amp;&amp; visitors_one.check_out.min != '' &amp;&amp; visitors_one.check_out.ampm != ''" class="ng-binding">
                                            30/09/2021 5:15 AM
                                        </span>
                                    </td>
                                    <td  class="">
                                        <button ng-show="$root.can('visitors.edit_vis') &amp;&amp; (visitors_one.check_out.date == '' || !visitors_one.check_out.date )" ng-click="check_out(visitors_one.id)" type="button" class="btn btn-success btn-circle ng-hide" title="Check Out" tooltip=""><i class="fa fa-sign-out"></i></button>
                                        <button ng-show="$root.can('visitors.edit_vis')" ng-click="edit(visitors_one.id)" type="button" class="btn btn-info btn-circle" title="Edit" tooltip=""><i class="fa fa-pencil"></i></button>
                                        <button ng-show="$root.can('visitors.del_vis')" ng-click="remove(visitors_one,$index)" type="button" class="btn btn-danger btn-circle" title="Remove" tooltip=""><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr><!-- end ngRepeat: visitors_one in visitors | itemsPerPage:20 -->
                                <tr  class="ng-hide">
                                    <td class="noTableData ng-binding" colspan="11">No Data Available</td>
                                </tr>
                            </tbody>
                        </table>
                    

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection