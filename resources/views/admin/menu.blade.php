@extends('layouts.app')


@section('page-content')
    <body>
    
        <div class="menu container">
            <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                                    <br>
                        <h1>Menu</h1>
                        <br>
                        <form class="form-horizontal" id="EditForm" role="form" method="POST" action="editMenu">
                                {{ csrf_field() }}
                                <section class="row">
                                    <!-- Button trigger modal -->
                                    <div class="col-4">
                                        <a  class="btn btn-success btn-block text-uppercase"  href="{{ route('addMenuItem') }}" >
                                        ADD ITEM
                                        </a>
                                    </div>
                                    <div class="col-4 offset-4">
                                        <button class="btn btn-primary  btn-block text-uppercase" id="Edit" name="Edit" value="Edit" onclick="return edit();">Edit</button>
                                    </div>
                                </section>  
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col" class="text-left">Price</th>
                                            <th scope="col" class="text-left">Rating</th>
                                            <th scope="col" class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menu as $item)
                                        <tr>
                                             
                                            <td><input type="text" class="form-control col-8" name="itemName[]" value="{{$item->name}}" disabled></td>
                                            <td><input type="number" class="form-control col-4" name="price[]" value="{{$item->price}}" disabled/></td>
                                            <td class="text-left">{{ round($item->rating/$item->ratingCount,2) }}</td>
                                            <td class="text-right"><button class="btn btn-sm btn-danger"id="delete"  name="submitButton" value="{{$item->id}}" type="submit"><i class="fa fa-trash"></i> Delete</button> </td>

                                        </tr>
                                    @endforeach
                                        

                                    </tbody>
                                </table>



                                <div class="col-3 offset-9">
                                                <button class="btn btn-block btn-primary text-uppercase" id="save" name="submitButton" value="save" type="submit">Save Changes</button>
                                </div>



                            </div>
                        </form>
                        <!-- Button trigger modal -->
                    </div>          
                </div>
            </div>
        </div>



<div>

        <script>
            function edit(){
            var el = document.getElementById('Edit');
            var frm = document.getElementById('EditForm');
            // el.addEventListener('click', function(){
                for(var i=0; i < frm.length; i++) {
                    frm.elements[i].disabled = false;

                } 
                // form.elements[0].focus(); // put focus on the first element
            // })
            return false;
        };


        // function addField(n)
        // {
        //     var myTable = document.getElementById("myTable");
        //     var currentIndex = myTable.rows.length;
        //     var currentRow = myTable.insertRow(-1);

        //     var linksBox = document.createElement("input");
        //     linksBox.setAttribute("name", "links" + currentIndex);

        //     var keywordsBox = document.createElement("input");
        //     keywordsBox.setAttribute("name", "keywords" + currentIndex);

        //     var violationsBox = document.createElement("input");
        //     violationsBox.setAttribute("name", "violationtype" + currentIndex);

        //     var addRowBox = document.createElement("input");
        //     addRowBox.setAttribute("type", "button");
        //     addRowBox.setAttribute("value", "Add another line");
        //     addRowBox.setAttribute("onclick", "addField();");
        //     addRowBox.setAttribute("class", "button");

        //     var currentCell = currentRow.insertCell(-1);
        //     currentCell.appendChild(linksBox);

        //     currentCell = currentRow.insertCell(-1);
        //     currentCell.appendChild(keywordsBox);

        //     currentCell = currentRow.insertCell(-1);
        //     currentCell.appendChild(violationsBox);

        //     currentCell = currentRow.insertCell(-1);
        //     currentCell.appendChild(addRowBox);
        // }

        </script>
    </body>
@stop