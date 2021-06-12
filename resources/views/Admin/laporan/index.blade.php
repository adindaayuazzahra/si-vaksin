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
				<th class="text-center">Userid</th>
				<th class="text-center">Vaksin</th>
				<th class="text-center">Tgl Pendaftaran</th>
				<th class="text-center">Status</th>
				<th class="text-center">Controls</th>
			</tr>
		</thead>

		<tbody>
			@foreach($laporan as $laporan)
				<tr>
					<td class="text-center">{{$laporan->id_user}}</td>
					<td class="text-center">{{$laporan->id_vaksin}}</td>
					<td class="text-center">{{$laporan->tgl_pendaftaran}}</td>
					<td class="fw-bold text-center">{{$laporan->id_status}}</td>
					<td>
						<a href="" class="border-0 bg-danger text-white nav-link text-center mb-2">Edit</a>
						
						<form action="" method="POST">
							@csrf
							@method('post')
							<button class="border-0 bg-warning text-dark nav-link w-100" type="submit" name="delete" value="delete">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
@endsection