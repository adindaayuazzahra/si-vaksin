@extends('Template.template_admin')
@section('title','goVaksin | Data Status')
@section('content')

<div class="row">
	<h2 class="text-dark justify-content-center">Data Pendaftaran Vaksin</h2>
</div>
<div class="row">
	<div class="col-md-9">
		<div class="row">
			<table id="table_id" class="display">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Status</th>
						<th class="text-center">Controls</th>
					</tr>
				</thead>

				<tbody>
					@foreach($status as $status)
						<tr>
							<td class="text-center">{{$status->id_status}}</td>
							<td class="fw-bold text-center">{{$status->status}}</td>
							<td>
								<a href="{{ url('admin/data-status/edit/'.$status->id_status ) }}" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a>
								
								<form action="{{ url('admin/data-status/delete/'.$status->id_status ) }}" method="POST">
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

	<div class="col-md-3 mb-2 card">
		<form action="{{ url('admin/data-status/add') }}" method="POST" class="mt-5 mb-5 w-100" id="createForm">
			@csrf
			@method('post')

			<div class="form-group mb-3">
				<label for="status">Status</label>
				<input id="status" type="text" name="status" placeholder="@error('status') Vaksin wajib diisi. @enderror" class="@error('status') is-invalid @enderror form-control">
			</div>

		  	<button type="submit" class="btn btn-primary w-50" name="submit" value="submit">Simpan</button>

		</form>
	</div>
	
</div>



@endsection