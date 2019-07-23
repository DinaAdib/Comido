@extends('layouts.app')

@section('page-content')



    <body>
	<div class="menu container ">
    

    <div class="container mb-4">
        <div class="row">
            <div class="col-12 login-form">

            <form class="form-horizontal" role="form" method="POST" action="/order">
            {{ csrf_field() }}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" name="add" class="text-left"></th>
                                <th scope="col" class="text-left">Product</th>
                                <th scope="col" class="text-left">Quantity</th>
                                <th scope="col" class="text-right">Price</th>
                            </tr>
                        </thead>
                        <tbody>



                        @foreach($menu as $item)
                            <tr>
                                <td><input id = "item" type="checkbox" name="cartItems[{{ $item->id }}]" value="{{ $item->name }}" {{in_array($item->id,$ids)?'checked':''}} ></td>
                                <td>{{ $item->name }}</td>
                                <td><input class="form-control" type="number" name="quantity[{{ $item->id }}]" step="1" min="0" max="10" value="{{$item->quantity}}"></td>
                                <td class="text-right">{{ $item->price }} egp</td>
                            </tr>
                        @endforeach

                        <!-- @if(Session::has('quantity'))
                        <div class="alert alert-danger" role="alert">{{ Session::get('quantity') }}</div>
                        @endif -->

                        @if ($errors->has('quantity'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('quantity') }}</div>
                        @endif 

                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                <div class="row">
                
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </div>
                </div> 
            </div>

            </form>
                
            </div>



            <!-- <div class="row col-12">
                <div class = "form-group">
                    <div class="pickup">
                        <label for="pickup" >Choose Pick Up Time</label> 
                            <input type="time" name="pickUpTime" id="time" step="900" style="color:black">
                            @if ($errors->has('pickUpTime'))
                                <span class="help-inline">
                                    <strong>{{ $errors->first('pickUpTime') }}</strong>
                                </span>
                            @endif

                            <button type="submit" class="btn btn-primary" id="pickup">
                                Pick Up
                            </button>
                    </div>
                </div>
            </div> -->

            



            
        
        

            <!-- <section class="col-sm-12"> -->
            <!-- </section>  -->



    </div>
    </body>
@stop