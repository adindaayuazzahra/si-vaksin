@extends('Template.template_web')
@section('title','goVaksin | Not Found')
@section('css')
<style>
	body{
	  background: #7e21ff;
	  font-family: 'Lato', sans-serif;
	  color: white;
	}
	.container img {
	  margin-top: 50px;
	  margin-right: -50px;
	}
	.container .content {
	  margin-top: 140px;
	  margin-left: -50px;
	}
	.container .content h1 {
	  font-weight:600; 
	  font-size: 46pt;
	  font-family: 'Prata', serif;
	  margin-bottom: 9px;
	}
	.container a {
	  margin-top: 5px;
	  font-weight: 600;
	  color: white;
	  background-color: #ff7d63;
	  border-radius: 10px;
	  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
	}
	.navbar-text a {
	  border-radius: 10px;
	}
	@media (min-width: 576px) {
  
	}
</style>	
@endsection
@section('content')
	<div class="container">
		<div class="row h-50 mt-5 mb-5 p-0">
			<div class="m-auto mt-5">
				<h1 class="text-center" style="font-size: 10vw;">500</h1>
				<h3 class="text-center" style="font-size: 4vw;">Server Error</h3>
			</div>
		</div>
		@if(Auth::check() && (Auth::user()->level!=3))
			<div class="row mt-5 p-0">
				<a href="{{ url('admin') }}" class="border-0 bg-transparent shadow-none text-decoration-none m-auto">Kembali ke halaman utama</a>	
			</div>
		@else
			<div class="row mt-5 p-0">
				<a href="{{ url('/') }}" class="border-0 bg-transparent shadow-none text-decoration-none m-auto">Kembali ke halaman utama</a>	
			</div>
		@endif
	</div>
@endsection