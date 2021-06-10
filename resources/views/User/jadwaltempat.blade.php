<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jadwal.css')}}">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Prata" rel="stylesheet">

    <title>goVaksin | Homepage</title>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">
        <img src="{{asset('img/goVaksinwhite.png')}}" height="35" class="d-inline-block align-top" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Jadwal & Tempat Vaksin</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Daftar Vaksin</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Syarat Vaksinasi</a>
          </li>
          {{-- <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          </li> --}}
        </ul>
        <span class="navbar-text">
          <a href="{{url('/login')}}" type="submit" class="btn text-white">MASUK</a>
          <a href="{{url('/daftar')}}" type="submit" class="btn btn-info text-white">DAFTAR</a>
        </span>
      </div>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>