<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title')</title>
		<link rel="icon" href="https://e7.pngegg.com/pngimages/1001/619/png-clipart-staff-of-hermes-caduceus-as-a-symbol-of-medicine-symbol-miscellaneous-blue.png" type="image/icon type">
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<style>
			body{
				height: 100vh;
				background-image: linear-gradient(.45deg, rgb(1,1,1), rgb(255,255,255));
			}
			.container, .row{
				height: 100vh;
			}

			@media screen and (max-width: 944px) {
				.container{
					width: 75%!important;
					height: 100vh;
				}	
			}
			@media screen and (max-width: 872px) {
				.w-50{
					width: 70%!important;
					height: 100vh;
				}
			}
			
			@media screen and (max-width: 768px) {
				.row,.container{
					width: 100%!important;
					height: 100vh;
					max-width: 100%!important;
					margin: 0!important;
				}	
				.card{
					background-color: inherit;
					border: 0;
				}
				.w-75{
					width: 90%!important;
					background-color: white;
					padding: 5%;
					border-radius: 10px;
				}
			}

			@media screen and (max-width: 550px) {
				.container{
					width: 100%!important;
					margin: 0!important;
					padding: 0!important;
					background-color: white;
				}
				.w-75{
					width: 100%!important;	
					background-color: inherit;
				}
			}
				
		</style>
	</head>

	<body>

		<div class="container m-0 p-0 w-75">
			<div class="row card">
				@yield('content')
			</div>
					
		</div>

		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>	

		<script>
		  	function loadPreview() {
		    	var imageUpload = document.getElementById('imageUpload');
		    	imageUpload.src = URL.createObjectURL(event.target.files[0]);
			    imageUpload.onload = function() {
			      URL.revokeObjectURL(imageUpload.src) // free memory
			    }
		 	};
		</script>

	</body>
</html>