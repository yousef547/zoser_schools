@extends('layouts.layout_login')
@section('title')
Reset Password
@endsection

@section('contect')

<div class="col-lg-3 pe-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">

                        <h3 class="text-center m-0">
                            <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-sm.png" height="60" alt="logo" class="my-3"></a>
                        </h3>

                        <div class="px-2 mt-2">
                            <h4 class="font-size-18 mb-2 text-center">Reset Password</h4>
                            <p class="text-muted text-center">Enter your Email and instructions will be sent to you!</p>

                            <form class="form-horizontal my-4" action="index.html">

                                <div class="mb-0">
                                    <label class="form-label" for="username">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
                                        <input type="text" class="form-control" id="username" placeholder="Email Address">
                                    </div>
                                </div>

                                <div class="mb-0 row">
                                    <div class="col-12 mt-4">
                                        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                            <!-- end form -->
                        </div>
                        <div class="m-2 text-center bg-light p-4 text-primary">
                            <h4 class="">Remember It ?</h4>
                            <p class="font-size-13">Join <span>Amezia</span> Now</p>
                            <a href="{{url('/')}}" class="btn btn-primary waves-effect waves-light">Sign In Here</a>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="mb-0">
                                ©
                                <script>document.write(new Date().getFullYear())</script>2021 Amezia. Crafted with <i class="mdi mdi-heart text-danger"></i>
                                by Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>

@endsection