@extends('Template.template_admin')
@section('title','goVaksin | Edit Status')
@section('content')
<div class="row">
	<h1 class="text-center w-100">Edit Status</h1>
	<hr class="dropdown-divider">
</div>
<div class="row">
	<form action="{{ url('admin/data-status/edit/'.$status->id_status) }}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('post')

		<div class="form-group mb-3">
			<label for="status">Status</label>
			<input type="text" name="status"  class="@error('status') is-invalid @enderror form-control" value="{{$status->status}}">
			@error('status')
			    <div class="alert alert-danger">{{ $message }}</div>
			@enderror
		</div>

	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="submit">Simpan</button>
	  	<button type="submit" class="btn btn-primary w-25" name="submit" value="cancel">Kembali</button>

	</form>
</div>
@endsection