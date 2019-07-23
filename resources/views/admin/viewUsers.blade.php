@extends('layouts.app')


@section('page-content')
    <body>
    
        <div class="menu container">
            <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                            <br>
                        <h1>Users</h1>
                        <form class="form-horizontal" id="ordersForm" role="form" method="POST" action="viewUsers">
                                {{ csrf_field() }}
                
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col" class="text-left">Email</th>
                                            <th scope="col" class="text-left">Phone Number</th>
                                            <th scope="col" class="text-left"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                             
                                            <td><input type="text" class="form-control col-8" value="{{$user->firstname.' '. $user->lastname}}" disabled></td>
                                            <td><input type="text" class="form-control col-8" value="{{$user->email}}" disabled/></td>
                                            <td><input type="text" class="form-control col-8" value="{{$user->phone}}" disabled/></td>
                                            <td class="text-right"><button class="btn btn-sm btn-danger"id="remove"  name="userID" value="{{$user->id}}" type="submit"><i class="fa fa-trash"></i> Remove</button> </td>

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