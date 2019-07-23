
@extends('layouts.app')

@section('page-content')
    <main role="main">
    @if (auth()->check() && auth()->user()->isAdmin())

     
      <div class="home container">
          <h1 class="display-3">Admin Page</h1>
           
        </div>

    @else
     <!-- Main jumbotron for a primary marketing message or call to action -->
     <div class="home container">
          <h1 class="display-3">Order now!</h1>
           <p><a class="btn btn-primary btn-lg" href="{{ route('order')}}" role="button">Order &raquo;</a></p>

        </div>
    @endif
    </main>

@stop

@section('footer')
<footer class="footer">
    <h2>EAT</h2>
    <h2>STUDY</h2>
    <h2>HAVE FUN</h2>
    <div class="text-right">
        ©2018 Comida</span>   
    </div>
</footer>

@stop