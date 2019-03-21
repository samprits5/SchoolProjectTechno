@extends('layouts.adminFrame')

@section('content')

<div style="width: 100%" class="jumbotron text-center bg-secondary text-white">
  <h4 class="display-4">Welcome Admin! &#x263A</h4>
</div>

<center class="mainContent" style="margin-top: 40px;">
	

<div class="row">
	<div class="col">
		<div class="row">
			<div class="col-md-4">
				<a style="text-decoration: none;" href="{{route('class')}}">
		<div style="height: 200px; width: 200px; background: #37B7AF; color: white; margin: 10px;  margin-left: 80px; border: 2px solid black; border-radius: 10px; cursor: pointer;">
			<h3 style="padding-top: 60px;">Class Management</h3>
		</div>
	</a>
		</div>
		<div class="col-md-4">
			<a style="text-decoration: none;" href="{{route('section')}}">
		<div style="height: 200px; width: 200px; background: #37B7AF; color: white; margin: 10px;  margin-left: 80px; border: 2px solid black; border-radius: 10px; cursor: pointer;">
			<h3 style="padding-top: 60px;">Section Management</h3>
		</div>
	</a>
	</div>
	<div class="col-md-4">
		<a style="text-decoration: none;" href="{{route('notice')}}">
		<div style="height: 200px; width: 200px; background: #37B7AF; color: white; margin: 10px; border: 2px solid black; border-radius: 10px; cursor: pointer;">
			<h3 style="padding-top: 60px;">Notice Management</h3>
		</div>
	</a>
	</div>
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col">
		<div class="row">
			<div class="col-md-4">
				<a style="text-decoration: none;" href="{{route('exam')}}">
		<div style="height: 200px; width: 200px; background: #37B7AF; color: white; margin: 10px; margin-left: 80px; border: 2px solid black; border-radius: 10px; cursor: pointer;">
			<h3 style="padding-top: 60px;">Exam Management</h3>
		</div>
		</a>
		</div>
		<div class="col-md-4">
			<a style="text-decoration: none;" href="{{route('result')}}">
		<div style="height: 200px; width: 200px; background: #37B7AF; color: white; margin: 10px; margin-left: 80px; border: 2px solid black; border-radius: 10px; cursor: pointer;">
			<h3 style="padding-top: 60px;">Result Management</h3>
		</div>
	</a>
	</div>
	<div class="col-md-4">
		<a style="text-decoration: none;" href="{{route('settings')}}">
		<div style="height: 200px; width: 200px; background: #37B7AF; color: white; margin: 10px; border: 2px solid black; border-radius: 10px; cursor: pointer;">
			<h3 style="padding-top: 80px;">Site Setting</h3>
		</div>
	</a>
	</div>
		</div>
	</div>
	
</div>

</center>


@endsection
