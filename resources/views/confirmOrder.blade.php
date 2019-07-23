@extends('layouts.app')

@section('page-content')



    <body>
	<script>
    function computeTotalPrice(itemName, value){
        elements = document.getElementsByName('cartItemPrice');
        
        // Change CART here

        var totalPrice = 0;
        for(var i=0; i<elements.length; i++){
            console.log(elements[i])
            totalPrice += parseFloat(element[i].innerHTML);
        }
        console.log(totalPrice)
        document.getElementById('totalPrice').innerHTML = totalPrice;
    }
    </script>
    <div class="menu container">

        <div class="container mb-4">
            <div class="row">
                <div class="col-12">

                    <form class="form-horizontal" role="form" method="POST" action="confirmOrder">
                    {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-left">Product</th>
                                        <th scope="col" class="text-left">Quantity</th>
                                        <th scope="col" class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>


                                @foreach($cart as $item)
                                    <tr>
                                        <td name="itemName[]" value="{{ $item->name }}">{{ $item->name }}</td>
                                        <td><input class="form-control" readonly onchange='computeTotalPrice("{{ $item->name }}", this.value)' type="number" name="cartItemQuantity" step="1" min="0" max="10" value="{{ $item->quantity }}"></td></td>
                                        <td  class="text-right"><span name="cartItemPrice">{{ $item->price * $item->quantity }}</span> egp</td>
                                    </tr>
                                @endforeach


                                <tr>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right" name="total"><strong id="totalPrice">{{$total}}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row col-12">
                            <div class = "form-group">
                                <div class="pickup">
                                    <label for="pickup" >Choose Pick Up Time</label> 
                                        <input type="time" name="pickUpTime" id="time" step="900" style="color:black">
                                        @if ($errors->has('pickUpTime'))
                                            <span class="help-inline">
                                                <strong>{{ $errors->first('pickUpTime') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <section class="row">
                            <div class="col-6 ">
                                <button class="btn btn-lg btn-block btn-success text-uppercase" name="submitButton" value="confirm" type="submit">Confirm</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-lg btn-block btn-danger text-uppercase" name="submitButton" value="cancel" type="submit">Cancel</button>
                            </div>
                        </section>
                        
                        </div> 
                    </form>
                    
                </div>
                    
            </div>
                    
        </div>
     </div>
    </body>
@stop