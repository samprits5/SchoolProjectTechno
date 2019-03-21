
@extends('layouts.adminFrame')
@section('content')
@include('includes.result_create_button')


<div class="container">

	<div class="row mainContent" style="margin-top: 30px; padding-left: 50px; padding-right: 50px;">
		<div class="col">

      
          @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif


      <div class="alert alert-dark" role="alert" style="margin-bottom: 15px;">
        <strong>Select Exam</strong>
      </div>
      <select class="form-control" name="exam" id="select1" style="margin-bottom: 15px;">
        <option value="0">-- Select --</option>
        @foreach($exm as $s)
              <option value="{{ $s->id }}">Class {{ $s->class }}{{ $s->section }} -- {{ $s->title }}</option>
        @endforeach
      </select>

      <center>

      <button class="fetch btn btn-success btn-blk" style="margin-bottom: 15px;">Fetch Data!</button>

      </center>
      
	
			<div class="table_gen"></div>



		</div>
	</div>
</div>


<script>
  $(function(){

        $(".fetch").click(function(){
          var exm = $("#select1").val();

          if (exm != 0) {

            $.ajax({
            url :'{{ route('resultFetch') }}',
            type:'POST',
            data :{
            "_token": "{{ csrf_token() }}",
            'exam':exm
            },
            success  :function(data){

              if (data == 0) {
                alert("No Records Found!");
              }

              else {

              var text = '';

              for (var i = 0; i < data.length; i++) {

                text += '<tr class="text-center"><th scope="row">'+ (i+1).toString() +'</th><td>'+ data[i][1] +'</td>'+'<td>'+ data[i][2] +'</td>'+'<td>'+ data[i][3] +'</td>'+ '<td>'+ data[i][4] +'</td>' + '<td><a href="/admin/results/edit/'+data[i][0]+'" style="text-decoration: none; color: white;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/admin/results/delete/'+data[i][0]+'" style="text-decoration: none; color: white;"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr>';
                  
              }

              $(".table_gen").html('</div><div style="margin-bottom: 0" class="alert alert-success" role="alert">Student Details -- Check Out Carefully!</div><table class="table table-borderless table-dark"><thead><tr class="text-center"><th scope="col">Sl No.</th><th scope="col">Student ID</th><th scope="col">Student Name</th><th scope="col">Percent</th><th scope="col">Grade</th><th scope="col">Action</th></tr></thead><tbody>'+text+'</tbody></table>');

              }
            }

            });

          } else {
            alert("Please select a value");
          }
      });


  });


</script>

@endsection