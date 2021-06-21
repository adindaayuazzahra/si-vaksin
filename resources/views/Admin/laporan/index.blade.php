@extends('Template.template_admin')
@section('title', 'goVaksin | Laporan')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Pendaftaran Vaksin</h2>
</div>
<div class="row">
	<table id="table_id" class="display">
		<thead>
			<tr>
				<th class="text-center">Pendaftaran</th>
				<th class="text-center">User</th>
				<th class="text-center">Tgl Pendaftaran</th>
				<th class="text-center">Status</th>
				<th class="text-center">Controls</th>
			</tr>
		</thead>

		<tbody>
			@foreach($laporan as $laporan)
				<tr id="lid{{$laporan->id_pendaftaran}}">
					<td id="text-pendaftaran" class="text-center">{{$laporan->id_pendaftaran}}</td>
					<td id="text-user" class="text-center">{{$laporan->id_user}}</td>
					<td id="text-tgl" class="text-center">{{$laporan->tgl_pendaftaran}}</td>
					@if(!empty($laporan->status))
					<td id="text-status" class="text-center">{{$laporan->status->status}}</td>
					@else
					<td id="text-status" class="text-center"></td>
					@endif
					<td id="kontrol-laporan">
						<button type="button" class="btn btn-primary text-white w-100 mb-1" onclick="editLap({{$laporan->id_pendaftaran}})" data-bs-toggle="modal" data-bs-target="#editModal">Status</button>

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
											<input id="id_pendaftaran2" type="hidden" name="id_pendaftaran">
											<div class="form-group mb-3">
												<label for="status2">Status</label>
												<select id="status2" class="form-control" name="id_status">
								                  <option>-- Pilih Status --</option>
								                  @foreach($list_status as $status)
								                    <option value="{{$status->id_status}}">{{$status->status}}</option>
								                  @endforeach
								                </select>
												<span class="text-danger" id="statusError2"></span>
											</div>
										</div>
										<div class="modal-footer">									        	
								        	<button type="submit" class="btn btn-primary w-25" name="submit" value="submit">Simpan</button>
								        	<button type="button" class="btn btn-secondary w-25"  data-bs-dismiss="modal" >Kembali</button>
							      		</div>
										 
									</form>
						    	</div>
						  	</div>
						</div>
						@if($akun->level==1)
							<form id="deleteForm" method="POST" action="{{url('admin/laporan/delete/'.$laporan->id_pendaftaran)}}">
								@csrf
								@method('post')
								<button type="submit" class="btn btn-danger text-white  w-100" name="submit" value="submit">Delete</button>
							</form>
						@endif
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
@endsection
@section('script')
<script>
	$(document).ready(function(){

		//edit handler
		$("#editForm").submit(function(e){
	  		e.preventDefault();
			$.ajax({
				url: "{{route('laporan.edit')}}",
				type: "POST",
				data: $(this).serialize(),
				success:function(response){
					console.log(response.id_pendaftaran);
					if (response) {
						$("#lid"+response.id_pendaftaran+" #text-status").text(response.status.status);
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

	function editLap(id){
		$.get('laporan/edit/'+id, function(pendaftar){
			$("#id_pendaftaran2").val(pendaftar.id_pendaftaran);
		});
	}
</script>
@endsection