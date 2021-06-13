@extends('Template.template_admin')
@section('title','goVaksin | Data Admin')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Admin</h2>
</div>
<div class="row">
	<div class="col-md-9">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th class="text-center">Username</th>
					<th class="text-center">Image</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Controls</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_admin as $admin)
					<tr>
						<td>{{$admin->username}}</td>
						<td>
							@if($admin->img)
							<img src="{{ url('assets/admin/img/'. $admin->img) }}" width="100" class="img-thumbnail rounded mx-auto d-block">
							@endif
						</td>
						<td>{{$admin->nama}}</td>
						<td>
							<a href="{{ url('admin/data-admin/edit/'.$admin->id_admin) }}" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a>
							
							<form action="{{ url('admin/data-admin/delete/'.$admin->id_admin) }}" method="POST">
								@csrf
								@method('post')
								<button class="border-0 bg-warning text-dark nav-link w-100" type="submit" name="delete" value="delete">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>

	<div class="col-md-3 mb-2 card p-25">
		<form action="{{ url('admin/data-admin/add') }}" method="POST" class="mt-3 mb-3 w-100" enctype="multipart/form-data">
			@csrf
			@method('post')
			<div class="form-group mb-3">
				<label for="username">Username</label>
				<input type="text" name="username" placeholder="@error('username') Username wajib diisi. @enderror" class="@error('username') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="nama">Nama</label>
				<input type="text" name="nama" placeholder="@error('nama') Nama wajib diisi. @enderror" class="@error('nama') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="password">Password</label>
				<input type="password" name="password" class="@error('password') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-4">
				<label for="img">Image</label>
				<input type="file" name="img" onchange="loadPreview(event)" class="@error('img') is-invalid @enderror form-control">
				@error('img')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
			<div>
				<img id="imageUpload" class="img-thumbnail shadow rounded mx-auto d-block d-none">
			</div>

			<button type="submit" class="btn btn-primary w-50" name="submit" value="submit">Simpan</button>

		</form>
	</div>
</div>
@endsection