@extends('Template.template_admin')
@section('title','Data Vaksin')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Vaksin</h2>
</div>
<div class="row">
	<div class="col-md-8">
		<div class="row">
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th>Vaksin</th>
						<th>Image</th>
						<th>Deskripsi</th>
						<th>Harga</th>
						<th>Controls</th>
					</tr>
				</thead>

				<tbody>
					@foreach($list_vaksin as $vaksin)
						<tr>
							<td>{{$vaksin->nama_vaksin}}</td>
							<td>
								<img src="{{ url('assets/admin/img/'. $vaksin->img) }}" width="100" class="img-thumbnail rounded mx-auto d-block">
							</td>
							<td>{{$vaksin->deskripsi}}</td>
							<td class="fw-bold">Rp. {{$vaksin->harga}}</td>
							<td>
								<a href="{{ url('admin/data-vaksin/edit/'.$vaksin->id_vaksin) }}" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a>
								
								<form action="{{ url('admin/data-vaksin/delete/'.$vaksin->id_vaksin) }}" method="POST">
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
		<form action="{{ url('admin/data-vaksin/add') }}" method="POST" class="mt-2 mb-5 w-100" enctype="multipart/form-data">
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