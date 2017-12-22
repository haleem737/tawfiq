<div class="container">

    <div id='header' class="row">
        
        <div id='tawfiq-logo' class='col-md-6 text-left'>
            <a href='/'><img src="{{ asset('img/tawfiq-logo.png') }}"></a>
        </div>

        <div class='col-md-6 text-right'>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="/home">My Page</a></li>
                    <li><a href="/orders/show">My Order</a></li>
                    <li><a class='icons-links' href="#"><i class="fa fa-bell-o" style="color:#4D4D4D;font-size:22px;"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        <i class="fa fa-user-circle-o" style="color:#4D4D4D;font-size:22px;"> <span style="font-family:Archivo;font-size: 14px;"></i>{{ Auth::user()->name }} <span class="caret"></span></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

        </div>

    </div>


    <div class="row">
    
        <div class='main-links col-md-3 text-center'>
            <a href='/about'>ABOUT US</a>
        </div>

        <div class='main-links col-md-3 text-center'>
            <a href='/services'>SERVICES</a>
        </div>

        <div class='main-links col-md-3 text-center'>
            <a href='/ourcustomers'>OUR CLIENTS</a>
        </div>

        <div class='main-links col-md-3 text-center'>
            <a href='/contacus'>CONTACT US</a>
        </div>

    </div>

</div>

