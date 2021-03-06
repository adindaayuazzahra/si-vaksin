@extends('Template.template_admin')
@section('title','goVaksin | Data Status')
@section('content')

<div class="row">
	<h2 class="text-dark justify-content-center">Data Status</h2>
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
							<td id="text-id_status" class="text-center">{{$status->id_status}}</td>
							<td id="text-status" class="fw-bold text-center">{{$status->status}}</td>
							<td id="text-button">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editStatus({{$status->id_status}})" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>

								<!-- Modal -->
								<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
								  	<div class="modal-dialog modal-dialog-centered">
								    	<div class="modal-content">
									      	<div class="modal-header">
									        	<h5 class="modal-title" id="modalLabel">Edit Status</h5>
									        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      	</div>
								      
									        <form method="POST" class="w-100" id="editForm">
									        	<div class="modal-body">
													@csrf
													@method('post')
													<input type="hidden" id="id_status2" name="id_status">
													<div class="form-group mb-3">
														<label for="status2">Status</label>
														<input id="status2" type="text" name="status" class="form-control">
														<span class="text-danger" id="statusError2"></span>
													</div>
												</div>
												<div class="modal-footer">									        	
										        	<button type="submit" class="btn btn-primary w-25" name="submit">Simpan</button>
										        	<button type="button" class="btn btn-secondary w-25"  data-bs-dismiss="modal" >Kembali</button>
									      		</div>
												 
											</form>
								    	</div>
								  	</div>
								</div>
								
								<form id="deleteForm" method="POST" action="data-status/delete/{{$status->id_status}}">
									@csrf
									@method('post')
									<button type="submit" class="btn btn-danger text-white  w-100" name="submit">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-3 mb-2 card">
		<form method="POST" class="mt-5 mb-5 w-100" id="createForm">
			@csrf
			@method('post')

			<div class="form-group mb-3">
				<label for="status">Status</label>
				<input id="status" type="text" name="status" class=" form-control">
				<span class="text-danger" id="statusError"></span>
			</div>

		  	<button type="submit" class="btn btn-primary w-50" name="submit" value="submit">Simpan</button>

		</form>
	</div>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){

		//create handler
		$("#createForm").submit(function(e){
	  		e.preventDefault();

			$.ajax({
				url: "{{route('status.add')}}",
				type: "POST",
				data: $("#createForm").serialize(),
				success:function(response){
					if (response) {
						$("#table_id tbody").append('<tr id="sid'+response.id_status+'"><td id="text-id_status" class="text-center">'+response.id_status+'</td><td id="text-status" class="fw-bold text-center">'+response.status+'</td><td id="text-button"><button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editStatus('+response.id_status+')" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button><form id="deleteForm" method="POST" action="data-status/delete/'+response.id_status+'">@csrf @method("post")<button type="submit" class="btn btn-danger text-white  w-100" name="submit">Delete</button></form></td></tr>');
						$("#table_id dataTables_empty").addClass('d-none');
						$("#statusError").text('');
						$("#status").removeClass('is-invalid');
						$("#createForm")[0].reset();
					}
				},
				error:function(response){
					if(response.responseJSON.errors.status){
						$("#statusError").text(response.responseJSON.errors.status);
						$("#status").addClass('is-invalid');
					}
					else{
						$("#statusError").text('');
						$("#status").removeClass('is-invalid');
					}
				}
			});
		});
		
		
		//edit handler
		$("#editForm").submit(function(e){
	  		e.preventDefault();

			$.ajax({
				url: "{{route('status.edit')}}",
				type: "POST",
				data:  $("#editForm").serialize(),
				success:function(response){
					if (response) {
						$("#sid"+response.id_status+" #text-id_status").text(response.id_status);
						$("#sid"+response.id_status+" #text-status").text(response.status);
						$("#editModal").modal('toggle');
						$("#editForm")[0].reset();
					}
				},
				error:function(response){
					if(response.responseJSON.errors.status){
						$("#statusError2").text(response.responseJSON.errors.status);
						$("#status2").addClass('is-invalid');
					}
					else{
						$("#statusError2").text('');
						$("#status2").removeClass('is-invalid');
					}
				}
			});
		});
	});

	function editStatus(id){
		$.get('data-status/edit/'+id,function(status){
			$("#id_status2").val(status.id_status);
			$("#status2").val(status.status);
		});
	}
</script>
@endsection