@extends('layouts.app')

@section('page-content')
<head>
  <title>Comida - Add Menu Item</title>
</head>

<div class="container">
    <div class="row">
        <section class="col-sm-6 m-auto login-form">
            <form class="form-horizontal" role="form" method="POST" action="addMenuItem" name="login">
                                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('itemName') ? ' has-error' : '' }}">
                    <label for="itemName" class="col-sm-4 control-label">Product Name</label>
                    <div class="col-sm-12 m-auto">
                        <input id="itemName" type="text" class="form-control" name="itemName" placeholder="" required autofocus>

                        @if ($errors->has('itemName'))
                            <span class="help-block">
                            <strong>{{ $errors->first('itemName') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    <label for="price" class="col-sm-4 control-label">Price</label>
                    <div class="col-sm-12 m-auto">
                        <input id="price" type="integer" class="form-control" name="price" placeholder="" required autofocus>

                        @if ($errors->has('price'))
                            <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-8 m-auto">
                        <input class="btn btn-default btn-lg" type="submit" id="addButton" value="Add" font>
                    </div>
                </div>

            </form>
        </section>            
        </div>
    </div>

@stop
