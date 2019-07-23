@extends('layouts.app')

@section('page-content')



    <body>
	<div class="menu container">
    

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
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
                                <td class="text-right">
                                <?php
                                $rating=round($item->rating/$item->ratingCount,0);
                                for($i=1; $i<6; ++$i){
                                    echo '<i class="fa fa-star',( $rating<$i ?'-o':''),'" aria-hidden="true"></i>';
                                } ?>
                                </td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
    </div>

    </div>
    </body>
@stop