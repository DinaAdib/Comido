@extends('layouts.app')


@section('page-content')
    <body>
    
        <div class="menu container">
            <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                            <br>
                        <h1>Orders</h1>
                        <form class="form-horizontal" id="ordersForm" role="form" method="POST" action="orders">
                                {{ csrf_field() }}
                
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order ID</th>
                                            <th scope="col" class="text-left">Pickup Time</th>
                                            <th scope="col" class="text-left">Feedback</th>
                                            <th scope="col" class="text-right"></th>
                                            <th scope="col" class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                             
                                            <td><input type="text" class="form-control col-8" value="{{$order->id}}" disabled></td>
                                            <td><input type="time" class="form-control col-10" value="{{$order->pickUpTime}}" disabled/></td>
                                            <td class="text-right"><input type="textarea" class="form-control col-4" value="{{$order->feedback}}" disabled/></td>
                                            <td><button class="btn btn-md btn-primary" <?php if ($order->released != 0){ ?> disabled <?php   }  if ($order->released ==2){ ?> hidden <?php   } ?> id="release" name="submit[release]" value="{{$order->id}}" type="submit">{{$order->released == 0? "Release":"Released"}}</button> </td>
                                            <td><button class="btn btn-md btn-primary" <?php if ($order->released ==0){ ?> hidden <?php   } ?> <?php if ($order->released ==2){ ?> disabled <?php   } ?> id="pickup" name="submit[pickup]" value="{{$order->id}}" type="submit">{{$order->released == 2? "Picked Up":"Set Delivered"}}</button> </td>

                                        </tr>
                                    @endforeach
                                        

                                    </tbody>
                                </table>



                            </div>
                        </form>
                </div>
            </div>
        </div>



<div>

       
    </body>
@stop