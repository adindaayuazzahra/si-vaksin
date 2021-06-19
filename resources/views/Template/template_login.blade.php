<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">

    <style>
      body {
        background-image: linear-gradient(45deg,#0575E6,#7e21ff);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        font-family: 'Lato', sans-serif;
      }
      .card-login {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.6);
        overflow: hidden;
        height: 30rem;
      }
      .card-login .card-title {
        margin-bottom: 2rem;
        font-weight: 400;
        font-size: 30px;
      }
      .container {
        margin-top: 135px;
      }
      .card-login .card-img {
        width: 45%;
        background: scroll center url('https://source.unsplash.com/mAGZNECMcUg/414x512');
        background-size: cover;
      }
      .card-login .card-body {
        padding: 2rem;
      }
      .form-control {
        border-radius: 5rem;
        height: 50px;
      }
    </style>

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic" rel="stylesheet" />

    <title>@yield('title')</title>
  </head>
  <body>
    <body>
      <div class="container">
          <div class="row">
              <div class="col-lg-10 col-xl-9 mx-auto">
                  <div class="card card-login flex-row">
                      <div class="card-img d-none d-md-flex">
                          <!-- bacground ada di css -->
                      </div>
                      @yield('content')
                  </div>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>