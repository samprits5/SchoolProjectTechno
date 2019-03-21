@extends('layouts.adminFrame')
@section('content')
@include('includes.notice_create_button')

<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">
	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Notice ID</strong>
		</div>

    <input type="text" class="form-control" name="nid" aria-describedby="emailHelp" value="{{ $notice->nid }}" readonly style="margin-bottom: 15px;" readonly>

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Notice Title</strong>
		</div>

		<input value="{{ $notice->title }}" type="text" class="form-control" name="title" aria-describedby="emailHelp" placeholder="Enter a title" style="margin-bottom: 15px;" readonly>


		<div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Notice Description</strong>
		</div>

		<textarea type="text" rows="4" class="form-control" name="notice" aria-describedby="emailHelp" placeholder="Enter a title" style="margin-bottom: 15px;" readonly>{{ $notice->notice }}
			</textarea>

    <small id="emailHelp" class="form-text text-danger">

    	@if(Session::has('error'))
         {{ Session::get('error') }}
      @endif

    </small>

  </div>

  <a href="{{ route('noticeDelete', $notice->id) }}" name="save" class="btn btn-dark col-md-5">Delete&nbsp;&nbsp;<i class="fa fa-trash-o" aria-hidden="true"></i></a>

</form>

	</div>
</div>


@endsection