
@extends('layouts.adminFrame')
@section('content')
@include('includes.notice_create_button')

<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form action="{{ route('noticeInsert') }}" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">

      @csrf

	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Notice ID</strong>
		</div>

    <input type="text" class="form-control" name="nid" aria-describedby="emailHelp" value="{{ $uid }}" readonly style="margin-bottom: 15px;">

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Notice Title</strong>
		</div>

		<input type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter a title" style="margin-bottom: 15px;">

    @if(!empty($errors->first('title')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('title') }}</div>
                </span>
            @endif


		<div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Notice Description</strong>
		</div>

		<textarea type="text" rows="4" class="form-control" name="notice" aria-describedby="emailHelp" placeholder="Enter a title" style="margin-bottom: 15px;">
			</textarea>


      @if(!empty($errors->first('notice')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('notice') }}</div>
                </span>
            @endif



	<div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Select Catagory</strong>
      </div>


    <select class="form-control" name="cat" id="select1" style="margin-bottom: 15px;">
      <option>-- Select --</option>
      <option value="0">General</option>
      <option value="1">For Students</option>
      <option value="2">For Teachers</option>

    </select>

    @if(!empty($errors->first('cat')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('cat') }}</div>
                </span>
            @endif

    <div class="text-center">
    	<strong style="padding-right: 20px;">Important</strong>

    <label class="switch">.
	  <input type="checkbox" name="imp">
	  <span class="slider round"></span>
	</label>

	</div>




    <small id="emailHelp" class="form-text text-danger">

    	@if(Session::has('error'))
         {{ Session::get('error') }}
      @endif

    </small>

    <small id="emailHelp" class="form-text text-danger"></small>

  </div>

  <button type="submit" name="save" class="btn btn-dark col-md-5">Publish</button>
</form>

	</div>
</div>


@endsection