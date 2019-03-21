@extends('layouts.adminFrame')
@section('content')
@include('includes.student_create_button')


<div class="container">

	<div class="row mainContent" style="margin-top: 30px; padding-left: 50px; padding-right: 50px;">
		<div class="col">

      
          @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif


  <div class="drop" style="margin-bottom: 20px;">

    <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Select Class</strong>
      </div>
    <select class="form-control" name="class" id="select1" style="margin-bottom: 15px;">
      <option>-- Select --</option>
      @foreach($cls as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
      @endforeach
    </select>

    <div id="sectionsDropdown"></div>
    <center>
    <button style="margin-top: 15px; margin-bottom: 15px;" class="fetch btn btn-success">Fetch!</button>
    </center>

	<div class="table_gen"></div>



		</div>
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
          });

      });

      $(".fetch").click(function(){
          var cls = $("#select1").val();
          var sec = $("#select2").val();

          if (cls != null && sec != null) {

            $.ajax({
            url :'{{ route('studentFetch') }}',
            type:'POST',
            data :{
            "_token": "{{ csrf_token() }}",
            'id':cls,
            'sec':sec
            },
            success  :function(data){

              var text = '';

              for (var i = 0; i < data.length; i++) {

                text += '<tr class="text-center"><th scope="row">'+ (i+1).toString() +'</th><td>'+ data[i][1] +'</td>'+'<td>'+ data[i][2] +'</td>'+'<td>'+ data[i][3] +'</td>'+ '<td>'+ data[i][4] +'</td>' + '<td><a href="/admin/student/delete/'+data[i][0]+'" style="text-decoration: none; color: white;"><i class="fa fa-times" aria-hidden="true"></i></a></td></tr>';
                  
              }

              $(".table_gen").html('</div><div style="margin-bottom: 0" class="alert alert-success" role="alert">Student Details -- Check Out Carefully!</div><table class="table table-borderless table-dark"><thead><tr class="text-center"><th scope="col">Sl No.</th><th scope="col">Student ID</th><th scope="col">Student Name</th><th scope="col">Student Email</th><th scope="col">Phone Num</th><th scope="col">Action</th></tr></thead><tbody>'+text+'</tbody></table>');

              }
            });

          } else {
            alert("Please select a value");
          }
      })

  });


</script>

@endsection