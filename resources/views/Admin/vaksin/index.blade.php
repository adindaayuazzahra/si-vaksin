@extends('Template.template_admin')
@section('title','Data Vaksin')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Vaksin</h2>
</div>
<div class="row">
	<div class="col-md-9">
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
						<tr id="vid{{$vaksin->id_vaksin}}">
							<td id="nama-vaksin">{{$vaksin->nama_vaksin}}</td>
							<td id="img-vaksin">
								@if($vaksin->img)
									<img id="imageContent{{$vaksin->id_vaksin}}" src="{{url('assets/vaksin/img/'.$vaksin->img) }}" width="100" class="img-thumbnail rounded mx-auto d-block">
								@endif
							</td>
							<td id="deskripsi-vaksin" class="text-justify">{!!$vaksin->deskripsi!!}</td>
							<td id="harga-vaksin" class="fw-bold">Rp. {{$vaksin->harga}}</td>
							<td id="kontrol-vaksin">
								<button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editVaksin({{$vaksin->id_vaksin}})" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>

								<!-- Modal -->
								<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
								  	<div class="modal-dialog modal-dialog-centered">
								    	<div class="modal-content">
									      	<div class="modal-header">
									        	<h5 class="modal-title" id="modalLabel">Edit Vaksin</h5>
									        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      	</div>
								      		<form method="POST" class="w-100" id="editForm" enctype="multipart/form-data" action="{{url('admin/data-vaksin/edit')}}">
									        	<div class="modal-body">
									        		@csrf
													@method('post')
													<input type="hidden" id="id_vaksin2" name="id_vaksin">
													<div class="form-group mb-3">
														<label for="nama_vaksin2">Vaksin</label>
														<input id="nama_vaksin2" type="text" name="nama_vaksin" placeholder="@error('nama_vaksin') Vaksin wajib diisi. @enderror" class="@error('nama_vaksin') is-invalid @enderror form-control">
													</div>

													<div class="form-group mb-3">
														<label for="deskripsi2">Deskripsi</label>
														<input id="deskripsi2" type="text" name="deskripsi" placeholder="@error('deskripsi') Deskripsi wajib diisi. @enderror" class="@error('deskripsi') is-invalid @enderror form-control">
													</div>

													<div class="form-group mb-3">
														<label for="harga2">Harga</label>
														<input id="harga2" type="text" name="harga" placeholder="@error('harga') Harga wajib diisi. @enderror" class="@error('harga') is-invalid @enderror form-control">
													</div>

													<div class="form-group mb-3">
														<label for="img2">Image</label>
														<input id="img2" type="file" name="img" onchange="loadPreviewModal(event)" class="form-control" >
													</div>
													<div>
														<img id="imageUpload2" class="img-thumbnail shadow rounded mx-auto mb-3 d-block d-none">
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
								
								<form id="deleteForm" method="POST" action="{{url('admin/data-vaksin/delete/'.$vaksin->id_vaksin)}}">
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
		<form id="createForm" method="POST" class="mt-2 mb-5 w-100" enctype="multipart/form-data">
			@csrf
			@method('post')

			<div class="form-group mb-3">
				<label for="nama_vaksin">Vaksin</label>
				<input id="nama_vaksin" type="text" name="nama_vaksin" placeholder="@error('nama_vaksin') Vaksin wajib diisi. @enderror" class="@error('nama_vaksin') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="deskripsi">Deskripsi</label>
				<input id="deskripsi" type="text" name="deskripsi" placeholder="@error('deskripsi') Deskripsi wajib diisi. @enderror" class="@error('deskripsi') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="harga">Harga</label>
				<input id="harga" type="text" name="harga" placeholder="@error('harga') Harga wajib diisi. @enderror" class="@error('harga') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="img">Image</label>
				<input id="img" type="file" name="img" onchange="loadPreview(event)" class="@error('img') is-invalid @enderror form-control">
			</div>
			<div>
				<img id="imageUpload" class="img-thumbnail shadow rounded mx-auto mb-3 d-block d-none">
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
	  		let formData = new FormData(this);
			$.ajax({
				type: "POST",
				url: "{{route('vaksin.add')}}",
				data: formData,
				contentType: false,
				processData: false,
				success:function(response){
					if (response) {
						$("#table_id tbody").append('<tr id="vid'+response.id_vaksin+'"><td id="nama-vaksin">'+response.nama_vaksin+'</td><td id="img-vaksin">@if('+response.img+')<img id="imageContent'+response.id_vaksin+'" width="100" class="img-thumbnail rounded mx-auto d-block">@endif</td><td id="deskripsi-vaksin">'+response.deskripsi+'</td><td id="harga-vaksin" class="fw-bold">Rp. '+response.harga+'</td><td id="kontrol-vaksin"><button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editVaksin('+response.id_vaksin+')" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button><form id="deleteForm" method="POST" action="data-vaksin/delete/'+response.id_vaksin+'">@csrf @method("post")<button type="submit" class="btn btn-danger text-white  w-100" name="submit">Delete</button></form></td></tr>');
						
						if (!(response.img==null)) {
							var imageCreateUpload=document.getElementById('imageContent'+response.id_vaksin);
							imageCreateUpload.src=`{{url('assets/vaksin/img/${response.img}')}}`;
							imageCreateUpload.onload = function() {
						      URL.revokeObjectURL(imageCreateUpload.src) // free memory
							}
						}
						else{
							$("#imageContent"+response.id_vaksin).addClass('d-none');
						}
						$("#createForm")[0].reset();
						$("#imageUpload").addClass('d-none');
					}
				},
				error:function(){
					console.log(formData);
				}
			});
		});		
	});

	function editVaksin(id){
		$.get('data-vaksin/edit/'+id, function(vaksin){
			$("#id_vaksin2").val(vaksin.id_vaksin);
			$("#nama_vaksin2").val(vaksin.nama_vaksin);
			$("#deskripsi2").val(vaksin.deskripsi);
			$("#harga2").val(vaksin.harga);
			if (vaksin.img) {
				$("#imageUpload2").removeClass('d-none');
		    	var imageUpload2 = document.getElementById('imageUpload2');
		    	imageUpload2.src = `{{url('assets/vaksin/img/${vaksin.img}')}}`;
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