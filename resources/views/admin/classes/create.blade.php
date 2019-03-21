@extends('layouts.adminFrame')
@section('content')
@include('includes.class_create_button')


<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form action="{{ route('saveClass') }}" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">

      @csrf

	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Class Name</strong>
		</div>

    <input type="text" class="form-control" name="class_name" aria-describedby="emailHelp" placeholder="Enter class name" style="margin-bottom: 15px;">

    @if(!empty($errors->first('class_name')))
        <span class="help-block">
        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('class_name') }}</div>
        </span>
    @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Assign Sections</strong>
		</div>

    <select class="form-control" name="sections[]" id="select1" multiple="multiple" style="margin-bottom: 15px;">
    	@foreach($sec as $s)
      			<option value="{{ $s->id }}">{{ $s->name }}</option>
      @endforeach
    </select>

    @if(!empty($errors->first('sections')))
        <span class="help-block">
        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('sections') }}</div>
        </span>
    @endif


    <small id="emailHelp" class="form-text text-danger">

    	@if(Session::has('error'))
         {{ Session::get('error') }}
      @endif

    </small>

  </div>

  <button type="submit" name="save" class="btn btn-dark col-md-5">Save</button>
</form>

	</div>
</div>

@endsection