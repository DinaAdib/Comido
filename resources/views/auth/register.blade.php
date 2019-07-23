@extends('layouts.app')

@section('page-content')
<head>
<title>Comida - Register</title>
</head>
<div class="container">
    <div class="row">
        <section class="col-sm-8 m-auto login-form">
            
            <form class="form-horizontal" role="form" method="POST"  action="{{ route('register') }}">{{ csrf_field()}}

            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">

                 <label for="firstname" class="col-sm-4 control-label">First Name</label>

                <div class="col-sm-8 m-auto">
                   <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Enter Your First Name" value="{{ old('firstname') }}" required autofocus>

                      @if ($errors->has('firstname'))
                          <span class="help-block">
                               <strong>{{ $errors->first('firstname') }}</strong>
                          </span>
                      @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname" class="col-sm-4 control-label" >Last Name</label>
                <div class="col-sm-8 m-auto">
                    <input class="form-control" type="text" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Enter Your Last Name" required autofocus>
                    
                      @if ($errors->has('lastname'))
                          <span class="help-block">
                               <strong>{{ $errors->first('lastname') }}</strong>
                          </span>
                      @endif
                 </div>
            </div>


             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                 <label for="email" class="col-sm-4 control-label">E-Mail Address</label>

                  <div class="col-sm-8 m-auto">
                       <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                          @if ($errors->has('email'))
                                <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                 </span>
                           @endif
                    </div>
               </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                 <label for="password" class="col-sm-4 control-label">Password</label>

                    <div class="col-sm-8 m-auto">
                        <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                     <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
             </div>

            <div class="form-group">
                <label for="password-confirm" class="col-sm-4 control-label">Confirm Password</label>

                    <div class="col-sm-8 m-auto">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
            </div>
                
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone" class="col-sm-4 control-label">Phone Number</label>
                <div class="col-sm-8 m-auto">
                    <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="01xxxxxxxxx" required pattern="^01[0-2]{1}[0-9]{8}" title="Egyptian Phone Number">
                    @if ($errors->has('phone'))
                        <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            
            <br><br>

             <div class="form-group">
                <div class="col-sm-8 m-auto col-sm-offset-4">
                    <input class="btn btn-primary btn-lg" type="submit" id="submitButton" value="Submit" font>
                </div>
            </div>

            </form>
        </section>
    </div> 
</div> 

@stop
