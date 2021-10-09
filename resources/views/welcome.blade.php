@extends('layouts.layout_login')
@section('title')
log in
@endsection

@section('contect')


<div class="col-lg-3 pe-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">

                        <h3 class="text-center m-0">
                            <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-sm.png" height="60" alt="logo" class="my-3"></a>
                        </h3>

                        <div class="px-2 mt-2">
                            <h4 class="font-size-18 mb-2 text-center">Welcome Back !</h4>
                            <p class="text-muted text-center">Sign in to continue to Amezia.</p>

                            <form class="form-horizontal my-4" action="index.html">

                                <div class="mb-3">
                                    <label class="form-label" for="username">Username</label>
                                    <div class="input-group">

                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>

                                        <input type="text" class="form-control" id="username" placeholder="Enter username">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="userpassword">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                    </div>
                                </div>

                                <div class="mb-3 row mt-4">
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                            <label class="form-check-label" for="customControlInline">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-sm-6 text-end">
                                        <a href="{{url('resetpassword')}}" class="text-muted font-size-13"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="mb-3 mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log
                                            In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->
                        </div>
                        <div class="m-2 text-center bg-light p-4 text-primary">
                            <h4 class="">Don't have an account ? </h4>
                            <p class="font-size-13">Join <span>Amezia</span> Now</p>
                            <a href="auth-register.html" class="btn btn-primary waves-effect waves-light">Free
                                Register</a>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="mb-0">©
                                <script>document.write(new Date().getFullYear())</script>2021 Amezia. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>

@endsection