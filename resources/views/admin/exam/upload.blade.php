
@extends('layouts.adminFrame')
@section('content')
@include('includes.exam_create_button')


<div class="row mainContent">
	<div class="col-md-5 offset-md-3 text-center">
<form action="{{ route('saveExam') }}" enctype="multipart/form-data" method="POST" style="margin-top: 50px; border: 1px solid black; padding: 10px; background-color: #758AA2;">
	  <div class="form-group">

      @csrf


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


    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px; margin-top: 15px;">
        <strong>Exam Title</strong>
      </div>

    <input type="text" class="form-control" name="exam_name" aria-describedby="emailHelp" placeholder="Enter Exam Title" style="margin-bottom: 15px;">

    @if(!empty($errors->first('exam_name')))
        <span class="help-block">
        <div class="error" style="color: red; margin-bottom: 15px;">{{ $errors->first('exam_name') }}</div>
        </span>
    @endif


	    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px; margin-top: 15px;">
	    	<strong>Upload Your File</strong>
		</div>

      <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroupFileAddon01"><strong>file:://</strong></span>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" name="file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept=".pdf .doc .docx application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
      <label class="custom-file-label" for="inputGroupFile01">Choose an excel file</label>
    </div>
  </div>

  @if(!empty($errors->first('file')))
        <span class="help-block">
        <div class="error" style="color: red; margin-bottom: 15px; margin-top: 15px;">{{ $errors->first('file') }}</div>
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



<script>
	
	$(function(){

		$("#select1").change(function(){

			var cls = $("#select1").val();

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

			});
		});
	});

</script>

@endsection