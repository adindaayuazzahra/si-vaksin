<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/logo.png') }}">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<style>
			body{
				height: 100vh;
			}
			.text-justify{
				text-align: justify;
			}
		</style>
	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="{{ url('/') }}">Vaksin RI</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#">Home</a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link" href="#">Jadwal Vaksinasi</a>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link" href="#">Daftar Rumah Sakit</a>
		        </li>

		        <li class="nav-item dropdown">
		          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            Konsultasi
		          </a>
		          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		          	<li><p class="dropdown-item font-weight-bold">Konsultasi Vaksinasi</p></li>
		            <li><a class="dropdown-item" href="#">Menu 1</a></li>
		            <li><a class="dropdown-item" href="#">Menu 2</a></li>
		            <li><hr class="dropdown-divider"></li>
		            <li><p class="dropdown-item font-weight-bold">Konsultasi Pencegahan</p></li>
		            <li><a class="dropdown-item" href="#">Menu 3</a></li>
		          </ul>
		        </li>

		        <li class="nav-item">
		          <a class="nav-link" href="{{ url('admin') }}">Admin Sementara</a>
		        </li>

		      </ul>

		      <ul class="navbar-nav mb-2 mb-lg-0">
		      	@auth
				      	<li class="nav-item">
				          <a class="nav-link" href="">Profile</a>
				      	</li>
			      	</ul>

			      	<form action="{{ url('logout') }}" method="POST">
				        <button type="submit" name="logout" value="logout" class="btn border-0 bg-transparent">Logout</button>
				    </form>

		      	@else
			      		<li class="nav-item">
				          <a class="nav-link" href="{{ url('login') }}">Login</a>
				      	</li>

				      	<li class="nav-item">
				          <a class="nav-link" href="{{ url('signup') }}">Daftar</a>
				      	</li>
				    </ul>
		      	@endauth
		      	
		      
		        <!-- <form>
		        	<button class="btn border-0 bg-transparent">Login</button>
		        	<button class="btn border-0 bg-transparent">Daftar</button>
		        </form> -->
		    </div>
		  </div>
		</nav>

		<!--Percobaan notifikasi -->
		<div aria-live="polite" aria-atomic="true" class="position-absolute end-0" style="position: relative; min-height: 200px;z-index: 999;">
		  <!-- Position it -->
		  <div class="position-absolute top-0 end-0">

		    <!-- Then put toasts within -->
		    <div class="toast mb-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000000">
		      <div class="toast-header bg-secondary">
		        <img src="https://e7.pngegg.com/pngimages/1001/619/png-clipart-staff-of-hermes-caduceus-as-a-symbol-of-medicine-symbol-miscellaneous-blue.png" class="rounded mr-2" alt="..." width="30">
		        <strong class="me-auto text-white">Bootstrap</strong>
		        <small class="text-white p-2">just now</small>
		        <button type="button" class="ml-2 mb-1 border-0 close" data-dismiss="toast" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="toast-body">
		        See? Just like this.
		      </div>
		    </div>

		    <div class="toast mb-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000000">
		      <div class="toast-header bg-secondary">
		        <img src="https://e7.pngegg.com/pngimages/1001/619/png-clipart-staff-of-hermes-caduceus-as-a-symbol-of-medicine-symbol-miscellaneous-blue.png" class="rounded mr-2" alt="..." width="30">
		        <strong class="me-auto text-white">Bootstrap</strong>
		        <small class="text-white p-2">2 seconds ago</small>
		        <button type="button" class="ml-2 mb-1 border-0 close" data-dismiss="toast" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="toast-body">
		        Heads up, toasts will stack automatically
		      </div>
		    </div>
		  </div>
		</div>

		@yield('content')

		<footer class="bg-dark p-5 h-30 bottom-0 w-100">
			
		</footer>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<script>
			$(document).ready(function(){
				$('.toast').toast({autohide: true, delay:10000, animation:true});
				$('.toast').toast('show');
			  	
			  	$(".toast").click(function(){
			    	$('.toast').toast('hide');
			  	});

			  	// $('.toast').on('hidden.bs.toast',function(){
			  	// 	$('.toast').toast('show');
			  	// });
			});
		</script>
		
	</body>
</html>