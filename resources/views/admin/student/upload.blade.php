@extends('layouts.adminFrame')
@section('content')
@include('includes.student_create_button')


<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form action="{{ route('saveRecords') }}" enctype="multipart/form-data" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">

      @csrf

	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Upload Your Excel File</strong>
		</div>

      <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroupFileAddon01"><strong>file:://</strong></span>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
      <label class="custom-file-label" for="inputGroupFile01">Choose an excel file</label>
    </div>
  </div>

  @if(!empty($errors->first('file')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('file') }}</div>
                </span>
            @endif

  <small id="emailHelp" class="form-text text-danger">

    	@if(Session::has('error'))
         {{ Session::get('error') }}
      @endif

    </small>

  </div>

  <button type="submit" name="save" class="btn btn-dark col-md-5">Upload</button>
</form>

	</div>
</div>

@endsection