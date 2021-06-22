@extends('Template.template_admin')
@section('title', 'goVaksin | Laporan')
@section('content')
<div class="row">
	<h2 class="text-dark justify-content-center">Data Pembayaran Vaksin</h2>
</div>
<div class="row">
	<table id="table_id" class="display">
		<thead>
			<tr>
				<th class="text-center">Pendaftaran</th>
				<th class="text-center">Pembayaran</th>
				<th class="text-center">Tgl Pembayaran</th>
				<th class="text-center">Harga</th>
				<th class="text-center">Status</th>
				<th class="text-center">Controls</th>
			</tr>
		</thead>

		<tbody>
			<?php $count=0;$countNon=0; ?>
			@foreach($laporan as $laporan)
				<tr id="lid{{$laporan->id_pendaftaran}}">
					<td id="text-pendaftaran" class="text-center">{{$laporan->id_pendaftaran}}</td>
					<td id="text-user" class="text-center">{{$laporan->id_pembayaran}}</td>
					<td id="text-tgl" class="text-center">{{$laporan->tgl_pembayaran}}</td>
					<td id="harga" class="text-center harga">@currency($laporan->total_harga)</td>
					<td class="text-center">
						@if(empty($laporan->tgl_pembayaran))
							Telah membayar
							<?php $count+=$laporan->total_harga; ?>
							</td>
							<td id="kontrol">
								<form method="POST" action="{{url('admin/laporan/pembayaran/konfirmasi/'.$laporan->id_pembayaran)}}">
									@csrf
									@method('post')
									<button type="submit" value="payment" name="submit" class="btn btn-warning text-dark d-block m-auto">Telah membayar</button>
								</form>
							</td>
						@else
							Belum membayar
							<?php $countNon+=$laporan->total_harga; ?>
							<td id="kontrol">
								<form method="POST" action="{{url('admin/laporan/pembayaran/konfirmasi/'.$laporan->id_pembayaran)}}">
									@csrf
									@method('post')
									<button type="submit" value="nonpayment" name="submit" class="btn btn-danger text-white d-block m-auto">Belum membayar</button>
								</form>
							</td>
						@endif

					
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-4">
		<h6>Total Pembayaran: @currency($count)</h6>
		<h6>Total Belum Membayar: @currency($countNon)</h6>
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