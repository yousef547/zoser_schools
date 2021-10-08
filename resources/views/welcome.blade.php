@extends('layouts.layout_login')
@section('title')
HomePage
@endsection

@section('contect')


<section id="wrapper">

    <div class="login-register">
        <div class="login-box card">
            <div class="card-block">
                <form class="form-horizontal form-material" id="loginform" action="https://kharagny.com/zoser3/login" method="post">
                    <a href="javascript:void(0)" class="text-center db logo-text-login">
                        <img src="https://kharagny.com/zoser3/assets/images/logo-light.png"> </a>

                    <h3 class="box-title m-b-20">Sign in</h3>


                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" required="" placeholder="Username / E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" name="remember_me" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div> <a href="{{url('/resetpassword')}}" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Restore Password</a>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <input type="hidden" name="_token" value="zsGSXinfQlGPlTDRO4QmJZj39bKKIzOXXnQvcMkh">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign in</button>
                        </div>
                    </div>



                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p><a href="{{url('/terms')}}" class="text-info m-l-5"><b>School Terms</b></a></p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</section>

@endsection