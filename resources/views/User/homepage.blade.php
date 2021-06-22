@extends('Template.template_web')
@section('title','goVaksin | Homepage')
@section('css')
<style>
  body{
    background: #7e21ff;
    font-family: 'Lato', sans-serif;
    color: white;
  }
  .container img {
    margin-top: 50px;
  }
  .container a {
    margin-top: 5px;
    font-weight: 600;
    color: white;
    background-color: #ff7d63;
    border-radius: 10px;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 1);
  }
  .container a:hover {
    box-shadow: 0 1.5rem 2rem 0 rgba(0, 0, 0, 8.5);
  }
  .container .content h1 {
    font-weight:600; 
    font-size: 40pt;
    font-family: 'Prata', serif;
    margin-bottom: 9px;
    margin-top: 140px;
  }
  .container .content2 h1 {
    font-weight:600; 
    font-size: 27pt;
    font-family: 'Prata', serif;
    margin-bottom: 9px;
    margin-top: 80px;
  }
  .navbar-text a {
    border-radius: 10px;
  }
  @media (max-width: 725px) {
    .container img {
      padding-bottom: 30px;
    }
    .container .content h1 {
      margin-top: 30px;
      font-size: 30pt;
    }

    .container .content2 h1 {
      margin-top: 30px;
      font-size: 20pt;
    }
 }

</style>
@endsection

@section('content')

  @if(!Auth::check())
  <div class="container">
    <div class="row">
      
      <div class="col-md-6 col-sm-12 mx-auto">
        <div class="content">
          <h1>Bersedia Untuk Lindungi Indonesia Bebas Dari Covid?</h1>
          <p class="lead">Dapatkan Segera Vaksin di Rumah Sakit Terdekat!</p>
          <a class="btn btn-lg" href="{{url('/login')}}" role="button" data-toggle="tooltip" title="Indonesia Bebas Corona">Bersedia Sekarang</a>
        </div>
      </div>

      <div class="col-md-6 col-sm-12 mx-auto">
        <img class="" src="{{asset('img/gambar.png')}}" width="100%" height="100%" class="float-right" alt="">
      </div>

    </div>
  </div>
  @else
    <div class="container">
        
      <div class="row">
        <div class="col-md-8 col-sm-12 col-lg-6 mx-auto">
          <div class="content2">
            <h1>Vaksin COVID-19 merupakan vaksin yang digunakan menangani penyakit koronavirus 2019 (COVID-19). Sekarang daftar vaksin untuk daerah Jakarta sudah bisa via website goVaksin!</h1>
            <h4>Sebelum daftar yuk baca syaratnya dan ketentuannya terlebih dahulu!</h4>
            <a class="btn btn-lg bg-info" href="{{url('/syarat')}}" role="button">Syarat dan Ketentuan</a> <br>
            <a class="btn btn-lg mt-3" href="{{url('/daftar-vaksin')}}" role="button" data-bs-toggle="tooltip" title="Indonesia Bebas Corona">Bersedia Sekarang</a>
          </div>
        </div>

        <div class="col-md-8 col-sm-12 col-lg-6 mx-auto">
          <img src="{{asset('assets/user/indexuser.png')}}" width="100%" height="100%" class="float-right" alt="">
        </div>
      </div>
    </div>
  @endif
@endsection
