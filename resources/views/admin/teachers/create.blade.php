@extends('layouts.adminFrame')
@section('content')
@include('includes.teacher_create_button')


<div class="row mainContent">
	 <div class="col-md-5 offset-md-3 text-center">
<form action="{{route('saveTeacher')}}" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
  @csrf
    <div class="form-group">

      <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Teacher Name</strong>
    </div>

    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter teacher name" style="margin-bottom: 15px;">

    @if(!empty($errors->first('name')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('name') }}</div>
                </span>
            @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Email id</strong>
    </div>

      <input type="Email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email id" style="margin-bottom: 15px;">

      @if(!empty($errors->first('email')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('email') }}</div>
                </span>
            @endif
     

      <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
            <strong>Address</strong>
             </div>

          <div class="form-group">
                <textarea rows="4" class="form-control" type="text" name="address" id="address" placeholder="Teacher's Address"></textarea>
                </div>

                @if(!empty($errors->first('address')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('address') }}</div>
                </span>
            @endif

                <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
            <strong>Phone Number</strong>
             </div>

          <div class="form-group">
                <input class="form-control" type="text" name="phone" id="phone" placeholder="Teacher's Phone" />
                </div>

          @if(!empty($errors->first('phone')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('phone') }}</div>
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