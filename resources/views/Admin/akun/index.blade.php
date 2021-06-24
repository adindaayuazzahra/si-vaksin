@extends('Template.template_admin')
@section('title','goVaksin | Data Admin')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Admin</h2>
</div>
<div class="row">
	<div class="col-md-9">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th class="text-center">Username</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Email</th>
					<th class="text-center">Controls</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_admin as $admin)
					<tr id="aid{{$admin->id_user}}">
						<td id="text-username" class="text-center">{{$admin->username}}</td>
						<td id="text-nama" class="text-center">{{$admin->nama}}</td>
						<td id="text-email" class="text-center">{{$admin->email}}</td>
						<td id="text-control" >
							
							<button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editAdmin({{$admin->id_user}})" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>

							<!-- Modal -->
							<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
							  	<div class="modal-dialog modal-dialog-centered">
							    	<div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="modalLabel">Edit Data Admin</h5>
								        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      	</div>
							      
								        <form method="POST" class="w-100" id="editForm" enctype="multipart/form-data">
								        	<div class="modal-body">
												@csrf
												@method('post')
												<input type="hidden" id="id_user2" name="id_user">
												<div class="form-group mb-3">
													<label for="username2">Username</label>
													<input id="username2" type="text" name="username" class="form-control">
													<span class="text-danger" id="usernameError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="email2">Email</label>
													<input id="email2" type="email" name="email" class="form-control">
													<span class="text-danger" id="emailError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="nama2">Nama</label>
													<input id="nama2" type="text" name="nama" class="form-control">
													<span class="text-danger" id="namaError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="password2">Password</label>
													<input id="password2" type="password" name="password" class="form-control">
													<span class="text-danger" id="passwordError2"></span>
												</div>

												<div class="form-group mb-3">
													<label for="level2">Level</label>
													<input id="level2" type="number" name="level" class="form-control">
													<span class="text-danger" id="levelError2"></span>
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
							<form id="deleteForm" method="POST" action="{{url('admin/data-admin/delete/'.$admin->id_user) }}">
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
		<form id="createForm" method="POST" class="mt-3 mb-3 w-100" enctype="multipart/form-data">
			@csrf
			@method('post')
			<div class="form-group mb-3">
				<label for="username">Username</label>
				<input id="username" type="text" name="username" class="form-control">
				<span class="text-danger" id="usernameError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="email">Email</label>
				<input id="email" type="email" name="email" class="form-control">
				<span class="text-danger" id="emailError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="nama">Nama</label>
				<input id="nama" type="text" name="nama" class="form-control">
				<span class="text-danger" id="namaError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="password">Password</label>
				<input id="password" type="password" name="password" class="form-control">
				<span class="text-danger" id="passwordError"></span>
			</div>

			<div class="form-group mb-3">
				<label for="level">Level</label>
				<input id="level" type="number" name="level" class="form-control">
				<span class="text-danger" id="levelError"></span>
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
				type: "POST",
				url: "{{route('admin.add')}}",
				data: $("#createForm").serialize(),
				success:function(response){
					if (response) {
						$("#table_id tbody").append('<tr id="aid'+response.id_user+'"><td id="text-username" class="text-center">'+response.username+'</td><td id="text-nama" class="text-center">'+response.nama+'</td><td id="text-email" class="text-center">'+response.email+'</td><td id="text-control" ><button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editAdmin('+response.id_user+')" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button><form id="deleteForm" method="POST" action="data-admin/delete/'+response.id_user+'">@csrf @method("post")<button type="submit" class="btn btn-danger text-white  w-100" name="submit">Delete</button></form></td></tr>');
						
						$('#usernameError').text('');
						$('#username').removeClass('is-invalid');
						$('#emailError').text('');
			        	$('#email').removeClass('is-invalid');
			        	$('#namaError').text('');
			        	$('#nama').removeClass('is-invalid');
			        	$('#passwordError').text('');
			        	$('#password').removeClass('is-invalid');
			        	$('#levelError').text('');
			        	$('#level').removeClass('is-invalid');

						$("#createForm")[0].reset();
					}
				},
				error:function(response){
					if(response.responseJSON.errors.username){
						$('#usernameError').text(response.responseJSON.errors.username);
						$('#username').addClass('is-invalid');
					}
					else{
						$('#usernameError').text('');
						$('#username').removeClass('is-invalid');
					}
			        if(response.responseJSON.errors.email){
			        	$('#emailError').text(response.responseJSON.errors.email);
			        	$('#email').addClass('is-invalid');
			        }
			        else{
			        	$('#emailError').text('');
			        	$('#email').removeClass('is-invalid');
			        }
			        if (response.responseJSON.errors.nama) {
			        	$('#namaError').text(response.responseJSON.errors.nama);
			        	$('#nama').addClass('is-invalid');
			        }
			        else{
			        	$('#namaError').text('');
			        	$('#nama').removeClass('is-invalid');
			        }
			        if (response.responseJSON.errors.password) {
			        	$('#passwordError').text(response.responseJSON.errors.password);
			        	$('#password').addClass('is-invalid');
			        }
			        else{
			        	$('#passwordError').text('');
			        	$('#password').removeClass('is-invalid');
			        }
			        if (response.responseJSON.errors.level) {
			        	$('#levelError').text(response.responseJSON.errors.level);
			        	$('level').addClass('is-invalid');
			        }
			        else{
			        	$('#levelError').text('');
			        	$('#level').removeClass('is-invalid');
			        }
				}
			});
		});
		
		//edit handler
		$("#editForm").submit(function(e){
	  		e.preventDefault();

			$.ajax({
				url: "{{route('admin.edit')}}",
				type: "POST",
				data: $("#editForm").serialize(),
				success:function(response){
					if (response) {
						$("#aid"+response.id_user+" #text-username").text(response.username);
						$("#aid"+response.id_user+" #text-nama").text(response.nama);
						$("#aid"+response.id_user+" #text-email").text(response.email);
						$('#usernameError2').text('');
						$('#username2').removeClass('is-invalid');
						$('#emailError2').text('');
			        	$('#email2').removeClass('is-invalid');
			        	$('#namaError2').text('');
			        	$('#nama2').removeClass('is-invalid');
			        	$('#passwordError2').text('');
			        	$('#password2').removeClass('is-invalid');
			        	$('#levelError2').text('');
			        	$('#level2').removeClass('is-invalid');
						$("#editModal").modal('toggle');
						$("#editForm")[0].reset();
					}
				},
				error:function(response){
					if(response.responseJSON.errors.username){
						$('#usernameError2').text(response.responseJSON.errors.username);
						$('#username2').addClass('is-invalid');
					}
					else{
						$('#usernameError2').text('');
						$('#username2').removeClass('is-invalid');
					}
			        if(response.responseJSON.errors.email){
			        	$('#emailError2').text(response.responseJSON.errors.email);
			        	$('#email2').addClass('is-invalid');
			        }
			        else{
			        	$('#emailError2').text('');
			        	$('#email2').removeClass('is-invalid');
			        }
			        if (response.responseJSON.errors.nama) {
			        	$('#namaError2').text(response.responseJSON.errors.nama);
			        	$('#nama2').addClass('is-invalid');
			        }
			        else{
			        	$('#namaError2').text('');
			        	$('#nama2').removeClass('is-invalid');
			        }
			        if (response.responseJSON.errors.password) {
			        	$('#passwordError2').text(response.responseJSON.errors.password);
			        	$('#password2').addClass('is-invalid');
			        }
			        else{
			        	$('#passwordError2').text('');
			        	$('#password2').removeClass('is-invalid');
			        }
			        if (response.responseJSON.errors.level) {
			        	$('#levelError2').text(response.responseJSON.errors.level);
			        	$('level2').addClass('is-invalid');
			        }
			        else{
			        	$('#levelError2').text('');
			        	$('#level2').removeClass('is-invalid');
			        }
				}
			});
		});
	});

	function editAdmin(id){
		$.get('data-admin/edit/'+id, function(admin){
			$("#id_user2").val(admin.id_user);
			$("#username2").val(admin.username);
			$("#email2").val(admin.email);
			$("#nama2").val(admin.nama);
			$("#password2").val(admin.password);
			$("#level2").val(admin.level);
		});
	}
</script>
@endsection