<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand page-scroll" href="#page-top"  ><img height="60px" width="60px" src="{{ URL::asset('frontend\\images\\logo1.png') }}" alt="Sanza theme logo" ></a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
						<li>
							<a class="page-scroll" href="{{ route('root') }}">Home</a>
						</li>
						<li>
							<a class="page-scroll" href="{{route('about')}}">About</a>
						</li>
						<li>
							<a class="page-scroll" href="{{route('rootexams')}}">Exams</a>
						</li>
						@if(Session::has('student'))
						<li>
							<a class="page-scroll" href="{{route('rootresult')}}">Results</a>
						</li>
						@endif
						<li>
							<a class="page-scroll" href="{{route('rootnotice')}}">Notices</a>
						</li>
						<li>
							<a class="page-scroll" href="{{route('rootadmission')}}">Admissions</a>
						</li>
						<li>
							<a class="page-scroll" href="{{route('rootcontact')}}">Contact</a>
						</li>
						@if(!Session::has('student') && !Session::has('teacher'))
						<li>
							<div class="dropdown">
  <button class="btn btn-secondary dropdown-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">
    Login
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('std_login') }}" style="padding-left: 25px;">Student Login</a>
    <a class="dropdown-item" href="{{ route('tch_login') }}" style="padding-left: 25px;">Teacher Login</a>
    </li>
    @elseif(Session::has('student'))

		<li>
							<div class="dropdown">
  <button class="btn btn-secondary dropdown-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">
    Hi, {{Session::get('student')}}!
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('uilogout') }}" style="padding-left: 25px;">Log out!</a>
    </li>

    @elseif(Session::has('teacher'))
		
		<li>
							<div class="dropdown">
  <button class="btn btn-secondary dropdown-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;">
    Hi, {{Session::get('teacher')}}!
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route('uilogout') }}" style="padding-left: 25px;">Log out!</a>
    </li>

    @endif
  </div>
</div>
					</ul>

				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>