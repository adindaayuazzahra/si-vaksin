@extends('Template.template_admin')
@section('title','goVaksin | Data Rumah Sakit')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Rumah Sakit</h2>
</div>
<div class="row">
	<div class="col-md-8">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th>Rumah Sakit</th>
					<th>Image</th>
					<th>Alamat</th>
					<th>Keterangan</th>
					<th>Controls</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_rs as $rs)
					<tr>
						<td>{{$rs->nama_rs}}</td>
						<td>
							@if($rs->img)
								<img src="{{ url('assets/rs/img/'. $rs->img) }}" width="100" class="img-thumbnail rounded mx-auto d-block">
							@endif
						</td>
						<td>
							<p>{{$rs->alamat}}</p>
							<p>{{$rs->jadwal}}</p>
							<p>Telephone: {{$rs->no_telephone}}</p>
						</td>
						<td class="fw-bold">{{$rs->keterangan}}</td>
						<td>
							<a href="{{ url('admin/data-rumah-sakit/edit/'.$rs->id_rs) }}" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a>
							
							<form action="{{ url('admin/data-rumah-sakit/delete/'.$rs->id_rs) }}" method="POST">
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

	<div class="col-md-3 mb-2 ms-1 card p-25">
		<form action="{{ url('admin/data-rumah-sakit/add') }}" method="POST" class="mt-2 mb-5 w-100" enctype="multipart/form-data">
			@csrf
			@method('post')

			<div class="form-group mb-3">
				<label for="nama_rs">Nama Rumah Sakit</label>
				<input type="text" name="nama_rs" placeholder="RS Harapan" class="@error('nama_rs') is-invalid @enderror form-control">
				@error('nama_rs')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" placeholder="Jl. Setiabudi No 27" class="@error('alamat') is-invalid @enderror form-control">
				@error('alamat')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="no_telephone">Telephone</label>
				<input type="text" name="no_telephone" placeholder="no_telephone" class="@error('no_telephone') is-invalid @enderror form-control">
				@error('no_telephone')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="jadwal">Jadwal</label>
				<input type="text" name="jadwal" placeholder="jadwal" class="@error('jadwal') is-invalid @enderror form-control">
				@error('jadwal')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="keterangan">Keterangan</label>
				<input type="text" name="keterangan" class="form-control">
			</div>

			<div class="form-group mb-3">
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