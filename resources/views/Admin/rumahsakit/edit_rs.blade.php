@extends('Template.template_admin')
@section('title','goVaksin | Edit RS')
@section('content')
	<div class="row">
		<h1 class="text-center w-100">Edit Rumah Sakit</h1>
		<hr class="dropdown-divider">
	</div>
	<div class="row">
		<form action="{{ url('admin/data-rumah-sakit/edit/'.$rs->id_rs) }}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('post')

			<div class="form-group mb-3">
				<label for="nama_rs">Nama Rumah Sakit</label>
				<input type="text" name="nama_rs"  class="@error('nama_rs') is-invalid @enderror form-control" value="{{$rs->nama_rs}}">
				@error('nama_rs')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat"  class="@error('alamat') is-invalid @enderror form-control" value="{{$rs->alamat}}">
				@error('alamat')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="jadwal">Jadwal</label>
				<input type="text" name="jadwal" class="@error('jadwal') is-invalid @enderror form-control" value="{{$rs->jadwal}}">
				@error('jadwal')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="no_telephone">Telephone</label>
				<input type="text" name="no_telephone" class="@error('no_telephone') is-invalid @enderror form-control" value="{{$rs->no_telephone}}">
				@error('no_telephone')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="keterangan">Keterangan</label>
				<input type="text" name="keterangan" placeholder="keterangan" class="form-control" value="{{$rs->keterangan}}">
			</div>

			<div class="form-group mb-3">
				<label for="img">Image</label>
				<input type="file" name="img" onchange="loadPreview(event)" class="@error('img') is-invalid @enderror form-control">
				@error('img')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>
				<div>
					<img id="imageUpload" class="img-thumbnail shadow rounded mx-auto d-block mb-4" src="@if($rs->img) {{ url('assets/rs/img/'. $rs->img) }} @endif">
				</div>


		  	<button type="submit" class="btn btn-primary w-25" name="submit" value="submit">Simpan</button>
		  	<button type="submit" class="btn btn-primary w-25" name="submit" value="cancel">Kembali</button>

		</form>
		
	</div>
@endsection