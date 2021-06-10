@extends('Template.template_admin')
@section('title','goVaksin | Dashboard')
@section('content')
	<div class="container mb-5">
		<div class="row">
			<img class="rounded-circle img-thumbnail shadow w-25 m-auto" src="{{ asset('assets/admin/img/admin.svg') }}">

		</div>
		<div class="row card shadow">
			<h3 class="text-center">Welcome {{$akun}} to admin panel</h3>
		</div>
	</div>





@endsection