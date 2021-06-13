<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/logo.png') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/homepageuser.css')}}"> --}}

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Prata&display=swap" rel="stylesheet">

    <title>goVaksin | Homepage</title>
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

  </head>
  <body style="">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{asset('img/goVaksinwhite.png')}}" height="35" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/jadwal')}}">Jadwal & Tempat Vaksin</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Daftar Vaksin</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Syarat Vaksinasi</a>
            </li>
          </ul>
          <span class="navbar-text">
            <a href="{{url('/login')}}" type="submit" class="btn text-white">MASUK</a>
            <a href="{{url('/daftar')}}" type="submit" class="btn btn-info text-white">DAFTAR</a>
          </span>
        </div>
    </nav>

    {{-- jumbotron --}}
    <div class="container">
      <div class="row">
        
        <div class="col">
          <div class="content">
            <h1>Bersedia Untuk Lindungi Indonesia Bebas Dari Covid?</h1>
            <p class="lead">Dapatkan Segera Vaksin di Rumah Sakit Terdekat!</p>
            <a class="btn btn-lg" href="{{url('/login')}}" role="button">Bersedia Sekarang</a>
          </div>
        </div>

        <div class="col">
          <img src="{{asset('img/gambar.png')}}" width="100%" height="100%" class="float-right" alt="">
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