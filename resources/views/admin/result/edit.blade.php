@extends('layouts.adminFrame')
@section('content')

@foreach($cls as $s)
<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form action="{{ route('updateResults', $s->id) }}" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">

      @csrf

	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Student ID</strong>
		</div>
	
    <input type="text" class="form-control" name="class_name" aria-describedby="emailHelp" placeholder="Enter class name" style="margin-bottom: 15px;" value="{{$s->student_sid}}" readonly>

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Student Name</strong>
    </div>

    <input type="text" class="form-control" name="class_name" aria-describedby="emailHelp" placeholder="Enter class name" style="margin-bottom: 15px;" value="{{$s->student->name}}" readonly>


    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Exam Name</strong>
    </div>

    <input type="text" class="form-control" name="class_name" aria-describedby="emailHelp" placeholder="Enter class name" style="margin-bottom: 15px;" value="Class {{$s->exam->class}}{{$s->exam->section}} -- {{$s->exam->title}}" readonly>


    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Percent</strong>
    </div>

    <input type="text" class="form-control" name="percent" aria-describedby="emailHelp" placeholder="Enter class name" style="margin-bottom: 15px;" value="{{$s->percent}}">

    @if(!empty($errors->first('percent')))
                        <span class="help-block">
                        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('percent') }}</div>
                        </span>
                    @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Grade</strong>
    </div>

    <input type="text" class="form-control" name="grade" aria-describedby="emailHelp" placeholder="Enter class name" style="margin-bottom: 15px;" value="{{$s->grade}}">

    @if(!empty($errors->first('grade')))
                        <span class="help-block">
                        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('grade') }}</div>
                        </span>
                    @endif


@endforeach
    

  
    <small id="emailHelp" class="form-text text-danger">

    	@if(Session::has('error'))
         {{ Session::get('error') }}
      @endif

    </small>

    <small id="emailHelp" class="form-text text-danger"></small>

  </div>

  <button type="submit" name="save" class="btn btn-dark col-md-5">Update</button>
</form>

	</div>
</div>



@endsection