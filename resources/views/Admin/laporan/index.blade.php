@extends('Template.template_admin')
@section('title', 'goVaksin | Laporan')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Pendaftaran Vaksin</h2>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th class="text-center">Userid</th>
						<th class="text-center">Vaksin</th>
						<th class="text-center">Tgl Pendaftaran</th>
						<th class="text-center">Status</th>
						<th class="text-center">Controls</th>
					</tr>
				</thead>

				<tbody>
					@foreach($laporan as $laporan)
						<tr>
							<td class="text-center">{{$laporan->id_user}}</td>
							<td class="text-center">{{$laporan->id_vaksin}}</td>
							<td class="text-center">{{$laporan->tgl_pendaftaran}}</td>
							<td class="fw-bold text-center">{{$laporan->id_status}}</td>
							<td>
								<a href="" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a>
								
								<form action="" method="POST">
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
	</div>

	<div class="col-md-3 mb-2 ms-1 card">
		<form action="" method="POST" class="mt-2 mb-5 w-100" enctype="multipart/form-data">
			@csrf
			@method('post')

			<div class="form-group mb-3">
				<label for="nama_vaksin">Vaksin</label>
				<input type="text" name="nama_vaksin" placeholder="@error('nama_vaksin') Vaksin wajib diisi. @enderror" class="@error('nama_vaksin') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="deskripsi">Deskripsi</label>
				<input type="text" name="deskripsi" placeholder="@error('deskripsi') Deskripsi wajib diisi. @enderror" class="@error('deskripsi') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="harga">Harga</label>
				<input type="text" name="harga" placeholder="@error('harga') Harga wajib diisi. @enderror" class="@error('harga') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="img">Image</label>
				<input type="file" name="img" onchange="loadPreview(event)" class="@error('img') is-invalid @enderror form-control">
			</div>
			<div>
				<img id="imageUpload" class="img-thumbnail shadow rounded mx-auto mb-3 d-block d-none">
			</div>

		  	<button type="submit" class="btn btn-primary w-50" name="submit" value="submit">Simpan</button>

		</form>
	</div>
	
</div>

@endsection