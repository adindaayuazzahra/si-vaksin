@extends('Template.template_admin')
@section('title','goVaksin | Edit Admin')
@section('content')
<div class="row">
	<h1 class="text-center w-100">Edit Admin</h1>
	<hr class="dropdown-divider">
</div>
<div class="row">
	<form action="{{ url('admin/data-admin/edit/'. $admin->id_admin) }}" method="POST" class="m-auto w-75"  enctype="multipart/form-data">
		@csrf
		@method('post')

		<div class="d-inline-flex w-100 mb-4" enctype="multipart/form-data">
			<div class="col-md-6 me-2">
				<div class="form-group mb-3">
					<label for="username">Username</label>
					<input type="text" name="username" placeholder="andy27" class="@error('username') is-invalid @enderror form-control" value="{{$admin->username}}">
					@error('username')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>

				<div class="form-group mb-3">
					<label for="nama">Nama</label>
					<input type="text" name="nama" placeholder="Andy" class="@error('nama') is-invalid @enderror form-control" value="{{$admin->nama}}">
					@error('nama')
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
			</div>

			<div class="col-md-6">
				<div class="form-group mb-4">
					<label for="img">Image</label>
					<input type="file" name="img" onchange="loadPreview(event)" class="@error('img') is-invalid @enderror form-control">
					@error('img')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<div>
					<img id="imageUpload" class="img-thumbnail shadow rounded mx-auto d-block mb-4" src="@if($admin->img){{ url('assets/admin/img/'. $admin->img) }} @endif">
				</div>
			</div>
		</div>

		<button type="submit" class="btn btn-primary w-25" name="submit" value="submit">Ubah</button>
		<button type="submit" class="btn btn-primary w-25" name="submit" value="cancel">Kembali</button>


	</form>
</div>
@endsection