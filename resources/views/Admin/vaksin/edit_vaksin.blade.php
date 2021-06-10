@extends('Template.template_admin')
@section('title','Data Vaksin')
@section('content')
<div class=" container mb-5">
	
	<form action="{{ url('admin/data-vaksin/edit/'.$vaksin->id_vaksin) }}" method="POST">
		@csrf
		@method('post')

		<div class="form-group mb-3">
			<label for="nama_vaksin">Nama Vaksin</label>
			<input type="text" name="nama_vaksin" class="@error('nama_vaksin') is-invalid @enderror form-control" value="{{$vaksin->nama_vaksin}}">
			@error('nama_vaksin')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group mb-3">
			<label for="deskripsi">Deskripsi</label>
			<input type="text" name="deskripsi" class="@error('deskripsi') is-invalid @enderror form-control" value="{{$vaksin->deskripsi}}">
			@error('deskripsi')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group mb-3">
			<label for="harga">Harga</label>
			<input type="text" name="harga" class="@error('harga') is-invalid @enderror form-control" value="{{$vaksin->harga}}">
			@error('harga')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="submit">Simpan</button>
	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="cancel">Kembali</button>

	</form>


</div>

@endsection