@extends('layouts.frame')
@section('content')
<div class="container">
	<div class="row">
		<div class="col">

			<form class="login-form myForm" action="{{ route('adminLogin') }}" method="post">

				@csrf

					<center>
						<div class="alert alert-primary" role="alert">
						 	Login Form
						</div>
					</center>

					<div class="form-group">
		            <input class="form-control" type="text" name="username" id="username" placeholder="Username" />
		        	</div>

		        	@if(!empty($errors->first('username')))
				        <span class="help-block">
				        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('username') }}</div>
				        </span>
				    @endif

		            <div class="form-group">
		            <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
		            </div>

		            @if(!empty($errors->first('password')))
					<span class="help-block">
					<div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('password') }}</div>
					</span>
					@endif
					<center>
		            <button class="btn btn-success btn-block" type="submit" name="login">Login&nbsp;&nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i></button>
		            
		            </center>

					@if(Session::has('error'))
	                        <div class="alert alert-danger" style="margin-top: 10px;">
	                            {{ Session::get('error') }}
	                        </div>
	                    @endif

		        </form>
        </div>
        </div>
      </div>
@endsection


