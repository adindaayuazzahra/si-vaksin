@extends('Template.template_akun')
@section('title','Login')
@section('content')
	<form action="{{ url('admin/login') }}" method="POST" class="m-auto w-75">
		@csrf
		@method('post')
		@if(\Session::has('success'))
			<div class="alert alert-danger mb-3">
				{{\Session::get('success')}}
			</div>
		@endif
		<div class="form-group mb-3">
			<label for="username">Username</label>
			<input type="text" name="username" placeholder="andy27" class="@error('email') is-invalid @enderror form-control">
			@error('email')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group mb-3">
			<label for="password">Password</label>
			<input type="password" name="password" placeholder="password" class="@error('password') is-invalid @enderror form-control">
			@error('password')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-check mb-5">
	    	<input type="checkbox" class="form-check-input" name="cookie">
	    	<label class="form-check-label" for="cookie">Remember me</label>
	  	</div>

	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="login">Login</button>
	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="cancel">Kembali</button>

	</form>
@endsection