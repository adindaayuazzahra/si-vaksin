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
								        	<h5 class="modal-title" id="modalLabel">Edit Status</h5>
								        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								      	</div>
							      
								        <form method="POST" class="w-100" id="editForm" enctype="multipart/form-data">
								        	<div class="modal-body">
												@csrf
												@method('post')
												<input type="hidden" id="id_user2" name="id_user2">
												<div class="form-group mb-3">
													<label for="username2">Username</label>
													<input id="username2" type="text" name="username2" placeholder="@error('username2') Username wajib diisi. @enderror" class="@error('username2') is-invalid @enderror form-control">
												</div>

												<div class="form-group mb-3">
													<label for="email2">Email</label>
													<input id="email2" type="email" name="email2" class="@error('email2') is-invalid @enderror form-control">
												</div>

												<div class="form-group mb-3">
													<label for="nama2">Nama</label>
													<input id="nama2" type="text" name="nama2" placeholder="@error('nama2') Nama wajib diisi. @enderror" class="@error('nama2') is-invalid @enderror form-control">
												</div>

												<div class="form-group mb-3">
													<label for="password2">Password</label>
													<input id="password2" type="password" name="password2" class="@error('password2') is-invalid @enderror form-control">
												</div>

												<div class="form-group mb-3">
													<label for="level2">Level</label>
													<input id="level2" type="number" name="level2" class="@error('level2') is-invalid @enderror form-control">
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
							<form id="deleteForm" method="POST">
								@csrf
								@method('post')
								<input type="hidden" name="id_user3" id="id_user3" value="{{$admin->id_user}}">
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
				<input id="username" type="text" name="username" placeholder="@error('username') Username wajib diisi. @enderror" class="@error('username') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="email">Email</label>
				<input id="email" type="email" name="email" class="@error('email') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="nama">Nama</label>
				<input id="nama" type="text" name="nama" placeholder="@error('nama') Nama wajib diisi. @enderror" class="@error('nama') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="password">Password</label>
				<input id="password" type="password" name="password" class="@error('password') is-invalid @enderror form-control">
			</div>

			<div class="form-group mb-3">
				<label for="level">Level</label>
				<input id="level" type="number" name="level" class="@error('level') is-invalid @enderror form-control">
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
						
						$("#table_id tbody").append('<tr id="aid'+response.id_user+'"><td id="text-username" class="text-center">'+response.username+'</td><td id="text-nama" class="text-center">'+response.nama+'</td><td id="text-email" class="text-center">'+response.email+'</td><td id="text-control" ><button type="button" class="btn btn-warning text-dark w-100 mb-1" onclick="editAdmin('+response.id_user+')" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button><form id="deleteForm" method="POST">@csrf @method("post")<input type="hidden" name="id_user3" id="id_user3" value="'+response.id_user+'"><button type="submit" class="btn btn-danger text-white  w-100" name="submit">Delete</button></form></td></tr>');
						
						$("#createForm")[0].reset();
					}
				}
			});
		});
		
		//edit handler
		$("#editForm").submit(function(e){
	  		e.preventDefault();

	  		let id = $("#id_user2").val();
	  		let username = $("#username2").val();
	  		let email = $("#email2").val();
	  		let nama= $("#nama2").val();
	  		let password = $("#password2").val();
	  		let level = $("#level2").val();
	  		let _token=$("input[name=_token]").val();

			$.ajax({
				url: "{{route('vaksin.edit')}}",
				type: "POST",
				data:{
					id:id,
					username:username,
					email:email,
					nama:nama,
					password:password,
					level:level,
					_token:_token,
				},
				success:function(response){
					if (response) {
						$("#aid"+response.id_user+" #text-username").text(response.username);
						$("#aid"+response.id_user+" #text-nama").text(response.nama);
						$("#aid"+response.id_user+" #text-email").text(response.email);
						$("#editModal").modal('toggle');
						$("#editForm")[0].reset();
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
			$("#level2").val(admin.level);
		});
	}
</script>
@endsection