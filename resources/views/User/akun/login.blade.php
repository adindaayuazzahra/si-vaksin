<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo.png">
    <link rel="stylesheet" type="text/css" href="{{asset('css/loginuser.css')}}">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,700|Prata" rel="stylesheet">

    <title>goVaksin | Masuk</title>
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
                      <div class="card-body">
                          <h5 class="card-title text-center">Login</h5>
                          <form action="" method="POST">
                              <div class="form-group">
                                  <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" required autofocus>
                              </div>

                              <div class="form-group">
                                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                              </div>

                              <div class="form-check my-3 ml-1">
                                  <input class="form-check-input" type="checkbox" name="remember">
                                  <label class="form-check-label">
                                  Remember me
                                  </label>
                              </div>

                              <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">LOGIN</button>
                          </form>
                          <div class="mt-4 text-center">
                            <span>Belum Punya akun ?</span>
                          </div>
                          <a href="{{url('/daftar')}}" class="btn btn-lg btn-danger btn-block mt-2" type="submit" name="submit">REGISTER</a>
                          <div class="back-home">
                            <span class="text-center"><a href="{{url('/')}}">Kembali Ke Halaman Utama</a></span>
                          </div>
                      </div>
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