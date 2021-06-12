@extends('Template.template_admin')
@section('title','goVaksin | Edit Status')
@section('content')
<div class="row">
	<h1 class="text-center w-100">Edit Status</h1>
	<hr class="dropdown-divider">
</div>
<div class="row">
	<form method="POST" enctype="multipart/form-data">
		@csrf
		@method('post')

		<div class="form-group mb-3">
			<label for="status">Status</label>
			<input type="hidden" id="id_status" name="id_status" value="{{$status->status}}">
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
@section('script')
<script>
	$("#editForm").submit(function(e){
  		e.preventDefault();

  		let id = $("#id_status").val();
		let status = $("#status").val();
		let _token = $("input[name=_token]").val();

		$.ajax({
			url: "edit/"+id,
			type: "POST",
			data:{
				status:status,
				_token:_token,
			},
			success:function(response){
				if (response) {
					$("#sid"+response.id_status+" td:nth-child(1)").text(response.id_status);
					$("#sid"+response.id_status+" td:nth-child(2)").text(response.status);
					$("#Modal").modal('toggle');
					$("#editForm")[0].reset();
				}
			}
		});
	});
</script>

@endsection