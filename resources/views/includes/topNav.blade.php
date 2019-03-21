<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item 
      @if(Request::route()->getName() == 'dashboard')
          active
        @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link 
        @if(Request::route()->getName() == 'settings')
          active
        @endif" href="{{route('settings')}}">Settings</a>
      </li>

      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">

      <div class="nav-item dropdown" style="margin-right: 20px; margin-left: 50px;">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">

        @if(Session::has('user'))
          Hi, {{ Session::get('user') }}!
        @endif

        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('adminLogout') }}">Log Out&nbsp;&nbsp;&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
        </div>



    </form>
  </div>
</nav>