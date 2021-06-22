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
				<th class="text-center">Pembayaran</th>
				<th class="text-center">Tgl Pembayaran</th>
				<th class="text-center">Harga</th>
			</tr>
		</thead>

		<tbody>
			<?php $count=0; ?>
			@foreach($laporan as $laporan)
				<tr id="lid{{$laporan->id_pendaftaran}}">
					<td id="text-pendaftaran" class="text-center">{{$laporan->id_pendaftaran}}</td>
					<td id="text-user" class="text-center">{{$laporan->id_pembayaran}}</td>
					<td id="text-tgl" class="text-center">{{$laporan->tgl_pembayaran}}</td>
					<td id="harga" class="text-center harga">@currency($laporan->total_harga)</td>
					<?php $count+=$laporan->total_harga; ?>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-2">
		<h5>Total: @currency($count)</h5>
	</div>
	
</div>
@endsection
@section('script')
<script>
	// let lol=document.getElementsByClassName("harga");
	// let count=0;
	// $('.harga').each(function(){
	//   alert(this.text());
	// });
	// for(var i=0;i<lol.length;i++){
	// 	count+=$(lol[i]).val();
	// 	console.log($(lol[i]).text());
	// }
	// console.log(count);
</script>
@endsection