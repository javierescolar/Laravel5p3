<?php $brands = App\Brand::all(); ?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">Mobile Shopping</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            @foreach($brands as $brand)

            @if( $brand->calculateDaysCreated() <= 1)
            <li><a href="{{ URL::to('/') }}/brands/{{$brand->slug}}">{{$brand->name}} <span class="newBrand">new</span></a></li>
            @else
            <li><a href="{{ URL::to('/') }}/brands/{{$brand->slug}}">{{$brand->name}}</a></li>
            @endif
            @endforeach
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <div class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" id="search" name="search">
                </div>
                <div id="resultSearch"></div>

            </div>
            <li>
                <button id="buttonSearch" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </li>
            @if(Auth::guest())
            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Resgister</a></li>
            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            @else
            <li class="dropdown">
                <a href="{{ URL::to('/')}}/cart"><span id="iconCart" class="glyphicon glyphicon-shopping-cart"></span><span class="newBrand">{{Cart::content()->count()}}</span></a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class"img img_responsive" id="imgNav" src="{{URL::to('/')}}/img/{{Auth::user()->image}}"/>{{Auth::user()->name}} 
                         <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</nav>
