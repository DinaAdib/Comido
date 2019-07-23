  
<nav class="navbar navbar-expand-lg navbar-light bg-light container">
            <div class="container-fluid">
                <div class="navbar-header">
            
                    <a class="navbar-brand" href="/"> <img src="{{URL::asset('/svg/OrderBrand.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                    Comida
  </a>
                  
                </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" aria-controls="app-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <div class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <a class="nav-item nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                            <a class="nav-item nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                            <a class="nav-item nav-link {{ Request::is('menu') ? 'active' : '' }}" href="{{ route('menu') }}">Menu</a>

                        @elseif (auth()->user()->isAdmin())

                            <a class="nav-item nav-link {{ Request::is('admin/menu') ? 'active' : '' }}" href="{{ route('adminMenu') }}">Menu</a>
                            <a class="nav-item nav-link {{ Request::is('admin/orders') ? 'active' : '' }}" href="{{ route('orders') }}">Orders</a>
                            <a class="nav-item nav-link {{ Request::is('admin/viewUsers') ? 'active' : '' }}" href="{{ route('viewUsers') }}">Users</a>
                            <a class="mr-auto"> 
                            <a class="nav-item nav-link mr-auto" style="align:right" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                                    
                        </a> 

                        @else 
                        
                        <a class="nav-item nav-link {{ Request::is('menu') ? 'active' : '' }}" href="{{ route('menu') }}">Menu</a>
                        <a class="nav-item nav-link {{ Request::is('order') ? 'active' : '' }}" href="{{ route('order') }}">Order Now </a>
                        <a class="nav-item nav-link {{ Request::is('viewOrders') ? 'active' : '' }}" href="{{ route('viewOrders') }}">My Orders</a>
                        <a class="nav-item nav-link {{ Request::is('rate') ? 'active' : '' }}" href="{{ route('rate') }}">Rate</a>


                        <a class="mr-auto"> 
                            <a class="nav-item nav-link mr-auto" style="align:right" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                                    
                        </a> 
                        @endif
                    </ul>
                </div>
            </div>
        </nav>