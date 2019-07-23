@extends('layouts.app')

@section('page-content')


    <body>
	<div class="menu container">
    

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <br>
                <h2>Your Opinion Matters <i class="fa fa-smile-o"> </i></h2>
                <form class="form-horizontal" id="ordersForm" role="form" method="POST" action="rate">
                                {{ csrf_field() }}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col" class="text-right">Price</th>
                                <th scope="col" class="text-right">Rating</th>
                            </tr>
                        </thead>
                        <tbody>


                        @foreach($menu as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="text-right">{{ $item->price }} egp</td>
                                <td><input class="form-control col-4 offset-8" type="number" name="rate[{{$item->id}}]" step="1" min="1" max="5" value="{{round($item->rating/$item->ratingCount,0)}}"></td>
                                
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                    <button class="btn btn-md btn-primary"id="save"  name="submitButton" value="" type="submit"><i class="fa fa-save"></i> Save Rating</button> 

                </div>
                </form>
            </div>
            
    </div>

    </div>
    </body>
@stop