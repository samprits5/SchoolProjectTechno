@extends('layouts.adminFrame')
@section('content')
@include('includes.user_create_button')


<div class="container">

  <div class="row mainContent" style="margin-top: 30px; padding-left: 50px; padding-right: 50px;">
    <div class="col">

      @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif

      <div style="margin-bottom: 0" class="alert alert-success" role="alert">
        Admin Details -- Check Out Carefully!
      </div>
	
			<table class="table table-borderless table-dark">
  <thead>
    <tr class="text-center">
      <th scope="col">Sl No.</th>
      <th scope="col">Admin Name</th>
      <th scope="col">Email Id</th>
      <th scope="col">Password</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

    @php $n = 1; @endphp

    @foreach($usr as $s)
      <tr class="text-center">
        <th scope="row">{{ $n }}</th>
        <td>{{$s->name}}</td>
        <td>{{$s->email}}</td>
        <td><strong>******</strong></td>
        <td>
          <a href="{{ route('usrDelete', $s->id) }}" style="text-decoration-color: none; color: white;">
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