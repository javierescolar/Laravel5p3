
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">Mobile Shopping</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('/') }}">Home</a></li>
            @foreach($brandsnav as $brandnav)

            @if( $brandnav->calculateDaysCreated() <= 1)
            <li><a href="{{ URL::to('/') }}/brands/{{$brandnav->slug}}">{{$brandnav->name}} <span class="newBrand">new</span></a></li>
            @else
            <li><a href="{{ URL::to('/') }}/brands/{{$brandnav->slug}}">{{$brandnav->name}}</a></li>
            @endif
            @endforeach
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <div class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" id="search" name="search">
                    <span id="advSearch" class="glyphicon glyphicon-cog"></span>
                    <div id="advOption">
                        <div class="col-md-12">
                            <p class="font">Brand</p>
                            <select class="form-control input-sm inputAdvaOptionLong" id="brandSelected" name="brandSelected">
                                @foreach($brandsnav as $brandnav)
                                <option value="{{$brandnav->id}}">{{$brandnav->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <p class="font">Price between</p>
                            <input type="text" class="form-control inputAdvaOption" name="priceMin" id="priceMin">
                            <input type="text" class="form-control inputAdvaOption" name="priceMax" id="priceMax">
                        </div>

                        <div class="col-md-12">
                            <p class="font col-md-9">With Discount <input type="checkbox" class="form-control" id="checkDiscount" name="checkDiscount"></p>
                            <button id="searchButton" class="btn btn-default btn-sm col-md-3"><span class="glyphicon glyphicon-check"></span>Apply</button>
                        </div>

                    </div>
                </div>
                <div id="resultSearch"></div>

            </div>
            <li>
                <button id="buttonSearch" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </li>
            @if(Auth::guest())
            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            @else
            <li class="dropdown">
                <a href="{{ URL::to('/')}}/cart"><span id="iconCart" class="glyphicon glyphicon-shopping-cart"></span><span class="newBrand">{{Cart::content()->count()}}</span></a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    @if(Session()->has('imageGoogle'))
                    <img class="img img_responsive" id="imgNav" src="{{Session()->get('imageGoogle')}}"/>{{Auth::user()->name}} 
                         <span class="caret"></span>
                    @else
                    <img class="img img_responsive" id="imgNav" src="{{URL::to('/')}}/img/{{Auth::user()->image}}"/>{{Auth::user()->name}} 
                         <span class="caret"></span>
                    @endif
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
