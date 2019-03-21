@extends('layouts.adminFrame')
@section('content')
@include('includes.teacher_create_button')


<div class="container">

  <div class="row mainContent" style="margin-top: 30px; padding-left: 50px; padding-right: 50px;">
    <div class="col">

      @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif

      <div style="margin-bottom: 0" class="alert alert-success" role="alert">
        Teachers Details -- Check Out Carefully!
      </div>
	
			<table class="table table-borderless table-dark">
  <thead>
    <tr class="text-center">
      <th scope="col">Sl No.</th>
      <th scope="col">Teacher Name</th>
      <th scope="col">Email Id</th>
      <th scope="col">Phone Num</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  	@php $n = 1; @endphp

    @foreach($tch as $s)
      <tr class="text-center">
        <th scope="row">{{ $n }}</th>
        <td>{{$s->name}}</td>
        <td>{{$s->email}}</td>
        <td>{{$s->phone}}</td>
        <td>
          <a href="{{ route('teacherDelete', $s->id) }}" style="text-decoration-color: none; color: white;">
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