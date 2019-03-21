@extends('layouts.adminFrame')
@section('content')
@include('includes.exam_create_button')


<div class="container">

	<div class="row mainContent" style="margin-top: 30px; padding-left: 50px; padding-right: 50px;">
		<div class="col">

      
          @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif
      

      <div style="margin-bottom: 0" class="alert alert-success" role="alert">
        Section Details -- Check Out Carefully!
      </div>
	
			<table class="table table-borderless table-dark">
  <thead>
    <tr class="text-center">
      <th scope="col">Sl No.</th>
      <th scope="col">Exam Title</th>
      <th scope="col">Class</th>
      <th scope="col">Section</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    @php $n = 1; @endphp

    @foreach($exm as $s)
      <tr class="text-center">
        <th scope="row">{{ $n }}</th>
        <td>{{$s->title}}</td>
        <td>{{$s->class}}</td>
        <td>{{$s->section}}</td>
        <td><a href="{{ $s->path }}" style="text-decoration: none; color: white;"><i class="fa fa-download" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('delExam',$s->id) }}" style="text-decoration: none; color: white;"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
      </tr>

        @php $n++; @endphp
    @endforeach

  </tbody>
</table>



		</div>
	</div>
</div>

@endsection