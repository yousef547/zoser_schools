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
<style>
    .buttons-html5,
    .btn-group {
        display: none;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        @include('admin.inc.massage')
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">{{$newLang->roles}}</h4>
            </div>
        </div>
    </div>
    <div class="row" id="flex">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <a href="{{route('role')}}" class="btn btn-primary mb-2">{{$newLang->back}}</a>
                        </div>
                        <form method="POST" action="{{route('role.update',$id)}}">
                            @csrf
                            <div class="col-md-12">
                                <label class="col-sm-2 text-right control-label col-form-label ">{{$newLang->role_title}} * </label>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="role_title" value="{{$oneRole->role_title}}" class="form-control " placeholder="{{$newLang->role_title}}" required="">
                                    </div>
                                </div>
                                <label class="col-sm-2 text-right control-label col-form-label ">{{$newLang->role_desc}} * </label>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <textarea name="role_description" class="form-control" placeholder="{{$newLang->role_desc}} ">{{$oneRole->role_description}} </textarea>
                                    </div>
                                </div>
                                <label class="col-sm-2 text-right control-label col-form-label g">{{$newLang->role_default}} * </label>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <div class="radio-list">
                                            <label>
                                                <input type="radio" name="def_for" value="none" required="" {{$oneRole->def_for == "none" ? "checked" : ""}} class=""> {{$newLang->None}}
                                            </label>
                                        </div>
                                        <div class="radio-list">
                                            <label class="ng-binding">
                                                <input type="radio" name="def_for" value="teacher" required="" class="" {{$oneRole->def_for == "teacher" ? "checked" : ""}}> {{$newLang->teacher}}
                                            </label>
                                        </div>
                                        <div class="radio-list">
                                            <label class="ng-binding">
                                                <input type="radio" name="def_for" value="student" required="" class="" {{$oneRole->def_for == "student" ? "checked" : ""}}> {{$newLang->student}}
                                            </label>
                                        </div>
                                        <div class="radio-list">
                                            <label class="ng-binding">
                                                <input type="radio" name="def_for" value="parent" required="" class="" {{$oneRole->def_for == "parent" ? "checked" : ""}}> {{$newLang->parent}}
                                            </label>
                                        </div>
                                        <div class="radio-list">
                                            <label class="ng-binding">
                                                <input type="radio" name="def_for" value="admin" required="" class="" {{$oneRole->def_for == "admin" ? "checked" : ""}}> {{$newLang->Administrators}}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <table id="datatable-buttons" class="table table-striped table-bordered w-100 dataTable no-footer" role="grid" aria-describedby="datatable-buttons_info">

                                    <tbody id="old_data">
                                        @foreach($roles as $key => $values)
                                        <tr class=" ">
                                            <td class="sorting_1 centers">{{$key}}</td>
                                            <td class="centers">
                                                <div class="row">
                                                    @foreach($values as $value)
                                                    <div class="form-check my-3 col-md-4 px-5">
                                                        <input type="checkbox" class="form-check-input" name="role_permissions[]" {{in_array($key.'_'.$value ,$role_permissions)? "checked" : ""}} value="{{$key.'_'.$value }}" id="{{$key.'.'.$value }}">
                                                        <label class="form-check-label" for="customCheck1">{{$value }}
                                                            and conditions</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>


                                </table>
                            </div>
                            <button type="submit" class="btn btn-info">{{$newLang->submit}}</button>
                        </form>
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
</script>
@endsection
@endsection