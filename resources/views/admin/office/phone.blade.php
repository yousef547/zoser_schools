@extends('layouts.layout')
@section('title')
Visitors
@endsection

@section('contect')
<div id="parentDBArea" ng-view="" class="ng-scope">
    <div class="row page-titles no-print ng-scope">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0 ng-binding">Phone Calls</h3>
        </div>
        <div class="col-md-6 col-4 align-self-center">

        </div>
    </div>

    <div class="row ng-scope" ng-show="views.list">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <div ng-show="$root.can('phn_calls.Export')" class="pull-right card-block-input-group card-block-input-item">
                        <div class="btn-group no-print">
                            <button type="button" class="btn btn-success btn-flat ng-binding">Export</button>
                            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only ng-binding">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item ng-binding" href="index.php/phone_calls/export/excel">Export to Excel</a>
                                <a class="dropdown-item ng-binding" href="index.php/phone_calls/export/pdf" target="_BLANK">Export to PDF</a>
                            </div>
                        </div>
                    </div>
                    <button ng-show="$root.can('phn_calls.add_call')" ng-click="changeView('add')" class="btn pull-right btn-success card-block-input-item ng-binding">Add phone call</button>
                    <div class="pull-right card-block-input-group card-block-input-item">
                        <div class="input-group input-group-sm">
                            <input type="text" name="table_search" ng-model="searchText" placeholder="Search" ng-change="searchDB()" class="form-control input-sm ng-pristine ng-valid">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <h4 class="card-title ng-binding">List phone calls</h4>
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="ng-binding">Full name</th>
                                    <th class="ng-binding">Phone No</th>
                                    <th class="ng-binding">Email address</th>
                                    <th class="ng-binding">Call Type</th>
                                    <th class="ng-binding">Purpose</th>
                                    <th class="ng-binding">Time</th>
                                    <th class="ng-binding">Next Follow up</th>
                                    <th class="ng-binding">Call duration</th>
                                    <th style="width:160px;" ng-show="$root.can('phn_calls.edit_call') || $root.can('phn_calls.del_call')" class="ng-binding">Operations</th>
                                </tr>
                                <!-- ngRepeat: phone_calls_one in phone_calls | itemsPerPage:20 -->
                                <tr dir-paginate="phone_calls_one in phone_calls | itemsPerPage:20" total-items="totalItems" ng-repeat="phone_calls_one in phone_calls | itemsPerPage:20" class="ng-scope">
                                    <td class="ng-binding">Emad Abd El-Mageed</td>
                                    <td class="ng-binding">+20 112 100 6404</td>
                                    <td class="ng-binding">emad.abdelmegeed@gmail.com</td>
                                    <td>
                                        <span ng-switch="phone_calls_one.call_type">
                                            <!-- ngSwitchWhen: incoming --><span ng-switch-when="incoming" class="ng-binding ng-scope">Incoming</span>
                                            <!-- ngSwitchWhen: outgoing -->
                                        </span>
                                    </td>
                                    <td class="ng-binding">Asking about a student's level</td>
                                    <td class="ng-binding">21/08/2021 11:35 AM</td>
                                    <td><span ng-show="phone_calls_one.nxt_follow.date &amp;&amp; phone_calls_one.nxt_follow.date != ''" class="ng-binding">28/08/2021 12:30 PM</span></td>
                                    <td class="ng-binding">1 hour</td>
                                    <td ng-show="$root.can('phn_calls.edit_call') || $root.can('phn_calls.del_call')" class="">
                                        <button ng-show="$root.can('phn_calls.edit_call')" ng-click="edit(phone_calls_one.id)" type="button" class="btn btn-info btn-circle" title="Edit" tooltip=""><i class="fa fa-pencil"></i></button>
                                        <button ng-show="$root.can('phn_calls.del_call')" ng-click="remove(phone_calls_one,$index)" type="button" class="btn btn-danger btn-circle" title="Remove" tooltip=""><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr><!-- end ngRepeat: phone_calls_one in phone_calls | itemsPerPage:20 -->
                                <tr ng-show="!phone_calls.length" class="ng-hide">
                                    <td class="noTableData ng-binding" colspan="9">No Data Available</td>
                                </tr>
                            </tbody>
                        </table>
                        <dir-pagination-controls class="pull-right ng-isolate-scope" on-page-change="load_data(newPageNumber)" template-url="assets/templates/dirPagination.html">
                            <!-- ngIf: 1 < pages.length -->
                        </dir-pagination-controls>

                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection