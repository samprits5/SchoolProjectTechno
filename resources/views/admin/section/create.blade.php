@extends('layouts.adminFrame')
@section('content')
@include('includes.section_create_button')


<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form action="{{ route('saveSection') }}" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">

      @csrf

	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Class Name</strong>
		</div>

    <input type="text" class="form-control" name="section_name" aria-describedby="emailHelp" placeholder="Enter section name">

    @if(!empty($errors->first('section_name')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('section_name') }}</div>
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