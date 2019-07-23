@extends('layouts.app')


@section('page-content')
    <body>
    
        <div class="menu container">
            <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                            <br>
                        <h1>Orders</h1>
                        <form class="form-horizontal" id="ordersForm" role="form" method="POST" action="viewOrders">
                                {{ csrf_field() }}
                
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order Details</th>
                                            <th scope="col" class="text-left">Pickup Time</th>
                                            <th scope="col" class="text-left">Feedback</th>
                                            <th scope="col" class="text-left">State</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                             
                                            <td><input type="text" style= "word-wrap: break-word"  class="form-control col-8 " value="{{$order->details}}" disabled></td>
                                            <td><input type="time" class="form-control col-10" value="{{$order->pickUpTime}}" disabled/></td>
                                            <td class="text-right"><input type="textarea" class="form-control col-10" name="feedback[{{$order->id}}]" value="{{$order->feedback}}"/></td>
                                           
                                            <td><button class="btn btn-md {{$order->released == 0? 'btn-primary':'btn-success'}}" id="release" name="release" value="{{$order->id}}" type="submit">{{$order->released == 0? "IN PROGRESS":($order->released == 1? "READY":"PICKEDUP")}}</button> </td>
        
                                        </tr>
                                    @endforeach
                                        

                                    </tbody>
                                </table>

                               <button class="btn btn-md btn-primary"id="save"  name="submitButton" value="" type="submit"><i class="fa fa-edit"></i> Update Feedback</button> 


                            </div>
                        </form>
                </div>
            </div>
        </div>



<div>

       
    </body>
@stop