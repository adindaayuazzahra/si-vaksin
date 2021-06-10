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
					<th>Alamat</th>
					<th>Keterangan</th>
					<th>Kontak</th>
					<th>Controls</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_rs as $rs)
					<tr>
						<td>{{$rs->nama_rs}}</td>
						<td>
							<p>{{$rs->alamat}}</p>
							<p>{{$rs->provinsi}}</p>
						</td>
						<td class="fw-bold">{{$rs->keterangan}}</td>
						<td>{{$rs->no_telephone}}</td>
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
		<form action="{{ url('admin/data-rumah-sakit/add') }}" method="POST" class="mt-2 mb-5 w-100">
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
				<label for="keterangan">Keterangan</label>
				<input type="text" name="keterangan" class="@error('keterangan') is-invalid @enderror form-control">
				@error('keterangan')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

			<div class="form-group mb-3">
				<label for="harga">Harga</label>
				<input type="text" name="harga" placeholder="harga" class="@error('harga') is-invalid @enderror form-control">
				@error('harga')
				    <div class="alert alert-danger">{{ $message }}</div>
				@enderror
			</div>

		  	<button type="submit" class="btn btn-primary w-50" name="submit" value="submit">Simpan</button>

		</form>
	</div>
	
</div>
	
@endsection