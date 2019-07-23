@extends('layouts.app')

@section('page-content')
<head>
  <title>Comida - Login</title>
</head>

<div class="container">
    <div class="row">
        <section class="col-sm-6 m-auto login-form">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}" name="login">
                                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-12 m-auto">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your  Email" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-4 control-label">Password</label>                         
                    <div class="col-sm-12 m-auto">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8 m-auto">
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old("remember") ? 'checked' : '' }}> Remember Me
                        </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-8 m-auto">
                        <input class="btn btn-default btn-lg" type="submit" id="loginbutton" value="Login" font>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <div class="col-sm-8 m-auto">
                        <a class="btn btn-primary" href="{{ route('password.request') }}"> Forgot Your Password?</a>
                    </div> -->
                </div>             

            </form>
        </section>            
        </div>
    </div>

@stop
