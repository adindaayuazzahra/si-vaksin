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
						<tr id="sid{{$status->id_status}}">
							<td class="text-center">{{$status->id_status}}</td>
							<td class="fw-bold text-center">{{$status->status}}</td>
							<td>
								<a href="{{ url('admin/data-status/edit/'.$status->id_status ) }}" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a>
								
								<form action="{{ url('admin/data-status/delete/'.$status->id_status ) }}" method="POST" id="deleteForm">
									@csrf
									@method('post')
									<input type="hidden" name="id_status" id="id_status" value="{{$status->id_status}}">
									<button class="border-0 bg-warning text-dark nav-link w-100" type="submit" name="delete" value="delete">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="col-md-3 mb-2 card">
		<form method="POST" class="mt-5 mb-5 w-100" id="createForm">
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
@section('script')
<script>
	$(document).ready(function(){
		//create
		$("#createForm").submit(function(e){
	  		e.preventDefault();

			let status = $("#status").val();
			let _token = $("input[name=_token]").val();

			$.ajax({
				url: "{{route('status.add')}}",
				type: "POST",
				data:{
					status:status,
					_token:_token,
				},
				success:function(response){
					if (response) {
						
						$("#table_id tbody").prepend('<tr><td class="text-center sorting_1" >'+response.id_status+'</td><td class="fw-bold text-center">'+response.status+'</td><td><a href="data-status/edit/'+response.id_status+'" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a><form action="" method="POST"> @csrf @method("post") <button class="border-0 bg-warning text-dark nav-link w-100" type="submit" name="delete" value="delete">Delete</button></form></td>');
						
						$("#createForm")[0].reset();
					}
				}
			});
		});

		$("#deleteForm").submit(function(e){
	  		e.preventDefault();

			let status = $("#id_status").val();
			let _token = $("input[name=_token]").val();

			$.ajax({
				url: 'delete/'+ status,
				type: "POST",
				data:{
					status:status,
					_token:_token,
				},
				success:function(response){
					if (response) {
						// console.log(response);
					}
				}
			});
		});
	});
</script>
@endsection