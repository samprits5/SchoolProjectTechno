@extends('layouts.adminFrame')
@section('content')
@include('includes.user_create_button')


<div class="row mainContent">
	 <div class="col-md-5 offset-md-3 text-center">
<form action="{{route('saveUser')}}" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
  @csrf
    <div class="form-group">

      <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Admin Name</strong>
    </div>

    <input type="text" class="form-control" name="user_name" aria-describedby="emailHelp" placeholder="Enter class name" style="margin-bottom: 15px;">

    
    @if(!empty($errors->first('user_name')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('user_name') }}</div>
                </span>
            @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Email id</strong>
    </div>
      <input type="Email" class="form-control" name="user_email" aria-describedby="emailHelp" placeholder="Enter email id" style="margin-bottom: 15px;">


      @if(!empty($errors->first('user_email')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('user_email') }}</div>
                </span>
            @endif
     

      <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
            <strong>Password</strong>
             </div>

          <div class="form-group">
                <input class="form-control" type="password" name="user_password" id="password" placeholder="Password" />
                </div>

            @if(!empty($errors->first('user_password')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;marker-end: 15px;">{{ $errors->first('user_password') }}</div>
                </span>
            @endif

       

    <small id="emailHelp" class="form-text text-danger">
      @if(Session::has('error'))
                              {{ Session::get('error') }}
                      @endif
    </small>

    <small id="emailHelp" class="form-text text-danger"></small>

  </div>

  <button type="submit" name="save" class="btn btn-dark col-md-5">Save</button>
</form>

  </div>
</div>

@endsection