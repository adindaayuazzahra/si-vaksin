@extends('Template.template_admin')
@section('title','goVaksin | Data Rumah Sakit')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Rumah Sakit</h2>
</div>
<div class="row">
	<div class="col-md-9">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th>Rumah Sakit</th>
					<th>Image</th>
					<th>Alamat</th>
					<th>Keterangan</th>
					<th>Controls</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_rs as $rs)
					<tr id="rid{{$rs->id_rs}}">
						<td id="nama-rs">{{$rs->nama_rs}}</td>
						<td id="img-rs">
							@if($rs->img)
								<img id="imageContent{{$rs->id_rs}}" src="{{ url('assets/rs/img/'. $rs->img) }}" width="100" class="img-thumbnail rounded mx-auto d-block">
							@endif
						</td>
						<td id="deskripsi">
							<p>{{$rs->alamat}}</p>
							<p>{{$rs->jadwal}}</p>
							<p>Telephone: {{$rs->no_telephone}}</p>
						</td>
						<td id="keterangan" class="fw-bold">{{$rs->keterangan}}</td>
						<td id="kontrol-rs">
							<button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editRS({{$rs->id_rs}})" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>

							<!-- Modal -->
							<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
							  	<div class="modal-dialog modal-dialog-centered">
							    	<div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="modalLabel">Edit Rumah Sakit</h5>
								        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      	</div>
							      		<form action="{{url('admin/data-rumah-sakit/edit')}}" method="POST" class="w-100" id="editForm" enctype="multipart/form-data">
							      			@csrf
											@method('post')
								        	<div class="modal-body">
								        		
												<input type="hidden" id="id_rs2" name="id_rs">
												<div class="form-group mb-3">
													<label for="nama_rs2">Nama Rumah Sakit</label>
													<input id="nama_rs2" type="text" name="nama_rs" class="form-control">
													<span class="text-danger" id="namarsError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="alamat2">Alamat</label>
													<input id="alamat2" type="text" name="alamat" class="form-control">
													<span class="text-danger" id="alamatError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="no_telephone2">Telephone</label>
													<input id="no_telephone2" type="text" name="no_telephone" class="form-control">
													<span class="text-danger" id="telephoneError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="jadwal2">Jadwal</label>
													<input id="jadwal2" type="text" name="jadwal" class="form-control">
													<span class="text-danger" id="jadwalError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="keterangan2">Keterangan</label>
													<input id="keterangan2" type="text" name="keterangan" class="form-control">
													<span class="text-danger" id="keteranganError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="img2">Image</label>
													<input id="img2" type="file" name="img" onchange="loadPreviewModal(event)" class="form-control">
													<span class="text-danger" id="imgError2"></span>
												</div>
												<div>
													<img id="imageUpload2" class="img-thumbnail shadow rounded mx-auto d-block d-none">
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
							
							<form id="deleteForm" method="POST" action="{{url('admin/data-rumah-sakit/delete/'.$rs->id_rs)}}">
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

	<div class="col-md-3 mb-2 card p-25">
		<form id="createForm" method="POST" class="mt-2 mb-5 w-100" enctype="multipart/form-data">
			@csrf
			@method('post')

			<div class="form-group mb-3">
				<label for="nama_rs">Nama Rumah Sakit</label>
				<input id="nama_rs" type="text" name="nama_rs" class="form-control">
				<span class="text-danger" id="namarsError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="alamat">Alamat</label>
				<input id="alamat" type="text" name="alamat" class="form-control">
				<span class="text-danger" id="alamatError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="no_telephone">Telephone</label>
				<input id="telephone" type="text" name="no_telephone" class="form-control">
				<span class="text-danger" id="notelephoneError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="jadwal">Jadwal</label>
				<input id="jadwal" type="text" name="jadwal" class="form-control">
				<span class="text-danger" id="jadwalError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="keterangan">Keterangan</label>
				<input id="keterangan" type="text" name="keterangan" class="form-control">
				<span class="text-danger" id="keteranganError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="img">Image</label>
				<input type="file" name="img" onchange="loadPreview(event)" class="form-control">
				<span class="text-danger" id="imgError"></span>

			</div>
			<div>
				<img id="imageUpload" class="img-thumbnail shadow rounded mx-auto d-block d-none">
			</div>

		  	<button type="submit" class="btn btn-primary w-50" name="submit" value="submit">Simpan</button>

		</form>
	</div>
	
</div>
	
@endsection
@section('script')
<script>
	$(document).ready(function(){
		$("#createForm").submit(function(e){
			e.preventDefault();
			let formData=new FormData(this);
			$.ajax({
				type:"POST",
				url:"{{route('rs.add')}}",
				data: formData,
				contentType: false,
				processData: false,
				success:function(response){
					if (response) {
						$("#table_id tbody").append('<tr id="rid'+response.id_rs+'">'+
							'<td id="nama-rs">'+response.nama_rs+'</td>'+
							'<td id="img-rs">'+
								'@if('+response.img+')<img id="imageContent'+response.id_rs+'" width="100" class="img-thumbnail rounded mx-auto d-block">@endif '+
							'</td>'+
							'<td id="deskripsi">'+
								'<p>'+response.alamat+'</p>'+
								'<p>'+response.jadwal+'</p>'+
								'<p>Telephone: '+response.no_telephone+'</p>'+
							'</td>'+
							'<td id="keterangan" class="fw-bold">'+response.keterangan+'</td>'+
							'<td id="kontrol-rs">'+
								'<button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editRS('+response.id_rs+')" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>'+

								'<form id="deleteForm" method="POST" action="data-rumah-sakit/delete/'+response.id_rs+'">@csrf @method("post")<button type="submit" class="btn btn-danger text-white  w-100" name="submit">Delete</button>'+
							  	'</form></td></tr>');

						if (!(response.img==null)) {
							var imageCreateUpload=document.getElementById('imageContent'+response.id_rs);
							imageCreateUpload.src=`{{url('assets/rs/img/${response.img}')}}`;
							imageCreateUpload.onload = function() {
						      URL.revokeObjectURL(imageCreateUpload.src) // free memory
							}
						}
						else{
							$("#imageContent"+response.id_rs).addClass('d-none');
						}
						$("#namarsError").text('');
						$("#nama_rs").removeClass('is-invalid');
						$("#alamatError").text('');
						$("#alamat").removeClass('is-invalid');
						$("#telephoneError").text('');
						$("#telephone").removeClass('is-invalid');
						$("#jadwalError").text('');
						$("#jadwal").removeClass('is-invalid');
						$("#keteranganError").text('');
						$("#keterangan").removeClass('is-invalid');
						$("imgError").text('');
						$("#img").removeClass('is-invalid');

						$("#createForm")[0].reset();
						$("#imageUpload").addClass('d-none');
					}
				},
				error:function(response){
					if(response.responseJSON.errors.nama_rs){
						$("#namarsError").text(response.responseJSON.errors.nama_rs);
						$("#nama_rs").addClass('is-invalid');
					}
					else{
						$("#namarsError").text('');
						$("#nama_rs").removeClass('is-invalid');
					}
					if(response.responseJSON.errors.alamat){
						$("#alamatError").text(response.responseJSON.errors.alamat);
						$("#alamat").addClass('is-invalid');
					}
					else{
						$("#alamatError").text('');
						$("#alamat").removeClass('is-invalid');
					}
					if(response.responseJSON.errors.no_telephone){
						$("#telephoneError").text(response.responseJSON.errors.no_telephone);
						$("#telephone").addClass('is-invalid');
					}
					else{
						$("#telephoneError").text('');
						$("#telephone").removeClass('is-invalid');
					}
					if(response.responseJSON.errors.jadwal){
						$("#jadwalError").text(response.responseJSON.errors.jadwal);
						$("#jadwal").addClass('is-invalid');
					}
					else{
						$("#jadwalError").text('');
						$("#jadwal").removeClass('is-invalid');
					}
					if(response.responseJSON.errors.keterangan){
						$("#keteranganError").text(response.responseJSON.errors.keterangan);
						$("#keterangan").addClass('is-invalid');
					}
					else{
						$("#keteranganError").text('');
						$("#keterangan").removeClass('is-invalid');
					}
				}
			});
		});
	});
		
	function editRS(id){
		$.get('data-rumah-sakit/edit/'+id, function(rs){
			$("#id_rs2").val(rs.id_rs);
			$("#nama_rs2").val(rs.nama_rs);
			$("#alamat2").val(rs.alamat);
			$("#no_telephone2").val(rs.no_telephone);
			$("#jadwal2").val(rs.jadwal);
			if (rs.img) {
				$("#imageUpload2").removeClass('d-none');
		    	var imageUpload2 = document.getElementById('imageUpload2');
		    	imageUpload2.src = `{{url('assets/rs/img/${rs.img}')}}`;
			    imageUpload2.onload = function() {
			      	URL.revokeObjectURL(imageUpload2.src); // free memory
			    }
			}
			else{
				$("#imageUpload2").addClass('d-none');
			}
		});
	}
</script>

@endsection