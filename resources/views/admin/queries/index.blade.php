@extends('layouts.settingFrame')
@section('content')

<div class="container">

	<div class="row mainContent" style="margin-top: 100px; padding-left: 50px; padding-right: 50px;">
		<div class="col">

      
          @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif
      

      <div style="margin-bottom: 0" class="alert alert-success" role="alert">
        All Queries!!
      </div>
	
			<table class="table table-borderless table-dark">
  <thead>
    <tr class="text-center">
      <th scope="col">Sl No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

@php $n = 1; @endphp

    @foreach($q as $s)
      <tr class="text-center">
        <th scope="row">{{ $n }}</th>
        <td>{{$s->name}}</td>
        <td>{{$s->email}}</td>
        <td>{{$s->type}}</td>
        <td>{{$s->msg}}</td>
        <td><a href="{{ route('qDelete', $s->id) }}" style="text-decoration: none; color: white;"><i class="fa fa-times" aria-hidden="true"></i></a></td>
      </tr>

        @php $n++; @endphp
    @endforeach

  </tbody>
</table>


		</div>
	</div>
</div>

@endsection