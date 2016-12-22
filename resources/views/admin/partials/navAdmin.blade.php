<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/homeAdmin">Admin Panel</a>
    </div>
   
    
    <ul class="nav navbar-nav navbar-right">
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
    </ul>
  </div>
</nav>
