@extends('Template.template_admin')
@section('title','goVaksin | Data User')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Admin</h2>
</div>
<div class="row">
	<div class="col-md-12">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th class="text-center">Username</th>
					<th class="text-center">Email</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Controls</th>
				</tr>
			</thead>

			<tbody>
				@foreach($list_user as $user)
					<tr id="uid{{$user->id_user}}">
						<td id="text-username" class="text-center">{{$user->username}}</td>
						<td id="text-nama" class="text-center">{{$user->email}}</td>
						<td id="text-email" class="text-center">{{$user->nama}}</td>
						<td id="text-control">
							<a class="btn btn-primary text-white d-block m-auto w-50" href="{{url('admin/data-user/informasi/'.$user->id_user)}}">Informasi User</a>
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>
</div>
@endsection

	