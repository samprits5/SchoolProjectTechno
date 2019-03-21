@extends('layouts.settingFrame')
@section('content')
@include('includes.setting_upload_button')


<div class="container">

	<div class="row mainContent" style="margin-top: 30px; padding-left: 50px; padding-right: 50px;">
		<div class="col">

      
          @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
               {{ Session::get('error') }}
               </div>
          @endif


    <div style="margin-bottom: 0" class="alert alert-success" role="alert">
        Gallery Images!
      </div>
  
      <table class="table table-borderless table-dark">
  <thead>
    <tr class="text-center">
      <th scope="col">Sl No.</th>
      <th scope="col">Image</th>
      <th scope="col">Image Heading</th>
      <th scope="col">Image Path</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
@php $n = 1; @endphp

    @foreach($gal as $s)
      <tr class="text-center">
        <th scope="row" class="align-middle">{{ $n }}</th>
        <td class="align-middle">
          <a data-fancybox="gallery" href="{{$s->path}}">
          <img src="{{$s->path}}" alt="{{$s->name}}" height="50" width="50" style="border: 1px solid black; border-radius: 10px;">
        </a>
        </td>
        <td class="align-middle">{{$s->name}}</td>
        <td class="align-middle">{{$s->path}}</td>
        <td class="align-middle"><a href="{{ route('picDelete', $s->id) }}" style="text-decoration: none; color: white;"><i class="fa fa-times" aria-hidden="true"></i></a></td>
      </tr>

        @php $n++; @endphp
    @endforeach


  </tbody>
</table>


		</div>
	</div>
</div>

@endsection