@extends('layouts.adminFrame')
@section('content')
@include('includes.student_create_button')


<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form action="{{ route('saveStudent') }}" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">

      @csrf

	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
	    	<strong>Student ID</strong>
		  </div>

    <input type="text" class="form-control" name="sid" aria-describedby="emailHelp" value="{{$std}}" readonly style="margin-bottom: 15px;">

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Student Name</strong>
      </div>

    <input type="text" class="form-control" name="student_name" aria-describedby="emailHelp" placeholder="Enter Student Name" style="margin-bottom: 15px;">

    @if(!empty($errors->first('student_name')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('student_name') }}</div>
                </span>
            @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Student Email</strong>
      </div>

    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter Student Email" style="margin-bottom: 15px;">

    @if(!empty($errors->first('email')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('email') }}</div>
                </span>
            @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Student Address</strong>
      </div>

    <textarea type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter Student Address" style="margin-bottom: 15px;" rows="4"></textarea> 


    @if(!empty($errors->first('address')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('address') }}</div>
                </span>
            @endif


    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Student Phone</strong>
      </div>

    <input type="text" class="form-control" name="phone" aria-describedby="emailHelp" placeholder="Enter Student Phone" style="margin-bottom: 15px;">

    @if(!empty($errors->first('phone')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('phone') }}</div>
                </span>
            @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Student Guardian Name</strong>
      </div>

    <input type="text" class="form-control" name="student_g_name" aria-describedby="emailHelp" placeholder="Enter Student Guardian Name" style="margin-bottom: 15px;">

    @if(!empty($errors->first('student_g_name')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('student_g_name') }}</div>
                </span>
            @endif


    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Student Guardian Phone</strong>
      </div>

    <input type="text" class="form-control" name="g_phone" aria-describedby="emailHelp" placeholder="Enter Student Guardian Phone" style="margin-bottom: 15px;">

    @if(!empty($errors->first('g_phone')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('g_phone') }}</div>
                </span>
            @endif

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Select Class</strong>
      </div>
    <select class="form-control" name="class" id="select1" style="margin-bottom: 15px;">
      <option>-- Select --</option>
      @foreach($cls as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
      @endforeach
    </select>

    @if(!empty($errors->first('class')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('class') }}</div>
                </span>
            @endif

    <div id="sectionsDropdown"></div>

    @if(!empty($errors->first('section')))
                <span class="help-block">
                <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('section') }}</div>
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


<script>
  
  $(function(){

      $('#select1').change(function(){

          var cls = $('#select1').val();

          $.ajax({
            url :'{{ route('getSections') }}',
            type:'POST',
            data :{
            "_token": "{{ csrf_token() }}",
            'id':cls
            },
            success  :function(data){

              var text = '';
              text += '<option value="">-- Select --</option>';
              for (var i = 0; i < data.length; i++) {
                text += '<option value="'+ data[i] +'">'+ data[i] +'</option>';
              }

              $("#sectionsDropdown").html('<div class="alert alert-dark" role="alert" style="margin-bottom: 15px;"><strong>Select Sections</strong></div><select class="form-control" name="section" id="select2">'+text+'</select>');
           }
          })

      })

  })


</script>

@endsection