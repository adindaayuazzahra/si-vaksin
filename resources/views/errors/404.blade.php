@extends('Template.template_web')
@section('title','goVaksin | Not Found')
@section('content')
	<div class="container">
		<div class="row h-50 mt-5 mb-5 p-0">
			<div class="m-auto mt-5">
				<h1 class="text-center" style="font-size: 10vw;">404</h1>
				<h3 class="text-center" style="font-size: 4vw;">Not Found</h3>
			</div>
		</div>

		<div class="row mt-5 p-0">
			<a href="{{ url('/') }}" class="border-0 bg-transparent shadow-none text-decoration-none m-auto">Kembali ke halaman utama</a>	
		</div>
	</div>





@endsection