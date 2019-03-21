
@extends('layouts.adminFrame')
@section('content')
@include('includes.class_create_button')



<div class="container">

	<div class="row mainContent" style="margin-top: 30px; padding-left: 50px; padding-right: 50px;">
		<div class="col">

			@if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif

      <div style="margin-bottom: 0" class="alert alert-success" role="alert">
        Class Details -- Check Out Carefully!
      </div>
	
			<table class="table table-borderless table-dark">
  <thead>
    <tr class="text-center">
      <th scope="col">Sl No.</th>
      <th scope="col">Class Name</th>
      <th scope="col">Assigned Sections</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

@php $n = 1; @endphp

    @foreach($cls as $s)
      <tr class="text-center">
        <th scope="row">{{ $n }}</th>
        <td>{{$s->name}}</td>
        <td>
        	@foreach($s->sections as $se)
				{{ $se->name }}
        	@endforeach
        </td>
        <td>
          <a href="{{ route('classEdit', $s->id) }}" style="text-decoration-color: none; color: white;">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </a>
          &nbsp;&nbsp;&nbsp;
          <a href="{{ route('classDelete', $s->id) }}" style="text-decoration-color: none; color: white;">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </td>
      </tr>
        @php $n++; @endphp
    @endforeach

  </tbody>
</table>

		</div>
	</div>
</div>





@endsection