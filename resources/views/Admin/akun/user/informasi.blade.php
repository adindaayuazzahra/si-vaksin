@extends('Template.template_admin')
@section('title','goVaksin | Data User')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Informasi User</h2>
</div>
<div class="row">
	<div class="col-md-12">
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th class="text-center">NIK</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Alamat</th>
				</tr>
			</thead>

			<tbody>
				@foreach($user as $user)
					<tr id="uid{{$user->id_user}}">
						<td id="text-username" class="text-center">{{$user->nik}}</td>
						<td id="text-nama" class="text-center">{{$user->nama}}</td>
						<td id="text-email" class="text-center">{{$user->alamat}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="mt-3">
		<a href="{{route('admin.user.index')}}" class="btn btn-primary text-white">Kembali</a>
	</div>
</div>
@endsection