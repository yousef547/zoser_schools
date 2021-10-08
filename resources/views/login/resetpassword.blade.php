@extends('layouts.layout_login')
@section('title')
HomePage
@endsection

@section('contect')


<section id="wrapper">
        <div class="login-register">
            <div class="login-box card">            <div class="card-block">
                <form class="form-horizontal form-material" id="loginform" action="https://kharagny.com/zoser3/forgetpwd" method="post">
                    <a href="javascript:void(0)" class="text-center db logo-text-login">
                        <img src="https://kharagny.com/zoser3/assets/images/logo-light.png">                    </a>

                    <h3 class="box-title m-b-20">Restore Password</h3>

                                                                    <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" required="" placeholder="Username / E-mail">
                            </div>
                        </div>


                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <input type="hidden" name="_token" value="zsGSXinfQlGPlTDRO4QmJZj39bKKIzOXXnQvcMkh">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Restore Password</button>
                            </div>
                        </div>

                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <p><a href="https://kharagny.com/zoser3/register" class="text-info m-l-5"><b>Register a new membership</b></a></p>
                            </div>
                        </div>

                    
                </form>
            </div>
          </div>        </div>

    </section>

@endsection