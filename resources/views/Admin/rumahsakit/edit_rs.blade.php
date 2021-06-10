@extends('Template.template_admin')
@section('title','Data Vaksin')
@section('content')
	<form action="{{ url('admin/data-rumah-sakit/edit/'.$rs->id_rs) }}" method="POST">
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
			<label for="kelurahan">Kelurahan</label>
			<input type="text" name="kelurahan" class="@error('kelurahan') is-invalid @enderror form-control" value="{{$rs->kelurahan}}">
			@error('kelurahan')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group mb-3">
			<label for="kecamatan">Kecamatan</label>
			<input type="text" name="kecamatan" class="@error('kecamatan') is-invalid @enderror form-control" value="{{$rs->kecamatan}}">
			@error('kecamatan')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group mb-3">
			<label for="provinsi">Provinsi</label>
			<input type="text" name="provinsi" class="@error('provinsi') is-invalid @enderror form-control" value="{{$rs->provinsi}}">
			@error('provinsi')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group mb-3">
			<label for="keterangan">Keterangan</label>
			<input type="text" name="keterangan" placeholder="keterangan" class="@error('keterangan') is-invalid @enderror form-control" value="{{$rs->keterangan}}">
			@error('keterangan')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>


	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="submit">Simpan</button>
	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="cancel">Kembali</button>

	</form>




@endsection