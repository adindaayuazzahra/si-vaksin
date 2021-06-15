@extends('Template.template_admin')
@section('title','goVaksin | Edit Admin')
@section('content')
<div class="row">
	<h1 class="text-center w-100">Edit Admin</h1>
	<hr class="dropdown-divider">
</div>
<div class="row">
	<form action="{{ url('admin/data-admin/edit/'. $admin->id_user) }}" method="POST" class="m-auto w-75"  enctype="multipart/form-data">
		@csrf
		@method('post')

		<div class="d-inline-flex w-100 mb-4" enctype="multipart/form-data">
			<div class="col-md-6 me-2">
				<div class="form-group mb-3">
					<label for="username">Username</label>
					<input type="text" name="username" placeholder="@error('username') Username wajib diisi. @enderror" class="@error('username') is-invalid @enderror form-control" value="{{$admin->username}}">
				</div>

				<div class="form-group mb-3">
					<label for="email">Email</label>
					<input type="email" name="email" class="@error('email') is-invalid @enderror form-control" value="{{$admin->email}}">
				</div>

				<div class="form-group mb-3">
					<label for="nama">Nama</label>
					<input type="text" name="nama" placeholder="@error('nama') Nama wajib diisi. @enderror" class="@error('nama') is-invalid @enderror form-control" value="{{$admin->nama}}">
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group mb-3">
					<label for="password">Password</label>
					<input type="password" name="password" class="@error('password') is-invalid @enderror form-control">
				</div>

				<div class="form-group mb-3">
					<label for="level">Level</label>
					<input type="number" name="level" class="@error('level') is-invalid @enderror form-control" value="{{$admin->level}}">
				</div>
				
			</div>
		</div>

		<button type="submit" class="btn btn-primary w-25" name="submit" value="submit">Ubah</button>
		<button type="submit" class="btn btn-primary w-25" name="submit" value="cancel">Kembali</button>


	</form>
</div>
@endsection