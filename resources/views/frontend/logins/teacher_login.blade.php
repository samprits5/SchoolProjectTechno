@extends('layouts.frontendFrame')
@section('content')


<div class="row" style="margin-top: 80px;">
	<div class="col text-center">

		<section id="about" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Login as Teacher</h2>

	<form action="{{ route('loginTeacher') }}" method="POST" style="border: 1px solid black; padding: 10px; background-color: #99AAAB; margin-left: 300px; margin-right: 300px; padding-top: 40px;">

		<small id="emailHelp" class="text-danger" style="margin-bottom: 15px;">

    	@if(Session::has('error'))
         <strong>{{ Session::get('error') }}</strong>
      @endif

    </small>
	  <div class="form-group">

      @csrf

	    
	    <label for="email" style="margin-bottom: 15px; float: left;">Email Address</label>

    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" style="margin-bottom: 15px;">

    @if(!empty($errors->first('email')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('email') }}</div>
				        </span>
				    @endif
   

    	<label for="email" style="margin-bottom: 15px; float: left;">Password</label>


    <input type="password" class="form-control" name="password" aria-describedby="emailHelp" placeholder="Enter password" style="margin-bottom: 15px;">

    @if(!empty($errors->first('password')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('password') }}</div>
				        </span>
				    @endif


    <button type="submit" class="btn btn-secondary" name="save" style="margin-top: 25px;">Log In</button>


  </div>

  
</form>
							
						</div>
					</div>
				</div>
				
			</div>
			<!-- /.container -->
		</section>
		
	</div>

</div>


@endsection