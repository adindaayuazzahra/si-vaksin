<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jadwal.css')}}">

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Prata&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prata:regular" rel="stylesheet" />

    <title>goVaksin | Jadwal & Tempat</title>
    <style>
      body{
          font-family: 'Lato', sans-serif;
          background-color: #a25eff;
      }
      .navbar {
          background-color: #7e21ff;
      }
      .container {
          margin-top: 50px;
      }
      .card {
          width: 18rem;
          box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
          border-radius: 20px;
      }
      .card img{
          border-radius: 20px 20px 0px 0px;
      }
      .card .card-title {
          font-weight: 700;
          font-size: 14pt;
      }
      .judul {
          font-weight: bolder;
          font-size: 25px;
          text-align: center;
          color: white;
          font-family: 'Prata', serif;
      }
      .card-text {
          font-size: 11pt;
      }
      footer {
        background: #7e21ff;
        color: white;
      }

      /* respondsive */
      @media (min-width: 576px) {
        .container {
            margin-top: 50px;
        }
        .card {
            width: 28rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
            border-radius: 20px;
        }
        .card img{
            border-radius: 20px 20px 0px 0px;
        }
        .card .card-title {
            font-weight: 700;
            font-size: 18pt;
        }
        .judul {
            font-weight: bolder;
            font-size: 45px;
            text-align: center;
            color: white;
            font-family: 'Prata', serif;
        }
        .card-text {
            font-size: 13pt;
        }
        
      }
    </style>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark">
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

    <div class="container">
      <div class="col-md-12">
        <p class="judul">Jadwal Dan Tempat Vaksinasi COVID-19</p>
        <div class="row mt-4">
          @foreach($list_rs as $rs)
          <div class="col-md-5 m-auto d-block">
            <div class="card mb-5">
              <img class="" src="{{asset('assets/user/rs.jpeg')}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-hospital"></i>{{$rs->nama_rs}}</h5>
                <p class="card-text"><i class="fas fa-map-marker-alt"></i>{{$rs->alamat}}</p>
                <p class="card-text"><i class="fas fa-map-marker-alt"></i>Telephone : {{$rs->no_telephone}}</p>
                <h5 class="card-text"><i class="fas fa-clock"></i> 
                  <span class="badge badge-pill badge-dark">{{$rs->jadwal}}</span>
                </h5>
              </div>
            </div>
          </div>
          @endforeach
          
          
        </div>
      </div>  
    </div>


    {{-- footer --}}
    <!-- Footer -->
    <footer class="text-center text-lg-start">

      <!-- Section: Links  -->
      <section class="content-footer pt-1 pb-2">
        <div class="container text-center text-md-start mt-5">
          
          <!-- Grid row -->
          <div class="row">
            
            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-hospital-alt"></i> goVkasin
              </h6>
              <p>goVaksin adalah sebuah aplikasi berbasis web yang bergerak di bidang kesehatan serta berkerja sama dengan beberapa pihak rumah sakit untuk memudahkan masyarakat dalam mendapatkan vaksinnasi Covid-19.</p>
            </div>
            <!-- Grid column -->


            <!-- Grid column -->
            <div class="col-md-5 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Contact
              </h6>
              <p><i class="fas fa-home me-3"></i> Jakarta, Indonesia.</p>
              <p><i class="fas fa-envelope me-3"></i> govaksin@email.com</p>
              <p><i class="fas fa-phone me-3"></i> +62 21 4294875</p>
              <p><i class="fas fa-print me-3"></i> +62 21 4294875</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright: goVaksin.test
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>