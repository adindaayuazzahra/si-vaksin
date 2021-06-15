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
    margin-top: 60px;
    margin-right: -50px;
  }
  .container .content {
    margin-top: 10px;
    margin-left: -50px;
  }
  .container .content h1 {
    font-weight:600; 
    font-size: 27pt;
    font-family: 'Prata', serif;
    margin-bottom: 9px;
    margin-top: 80px;
    margin-right: -50px;
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
      
  <div class="row">
    <div class="col-md-6">
      <div class="content">
        <h1>Vaksin COVID-19 merupakan vaksin yang digunakan menangani penyakit koronavirus 2019 (COVID-19). Sekarang daftar vaksin untuk daerah Jakarta sudah bisa via website goVaksin!</h1>
        <h4>Sebelum daftar yuk baca syaratnya dan ketentuannya terlebih dahulu!</h4>
        <a class="btn btn-lg bg-info" href="{{url('/syarat')}}" role="button">Syarat dan Ketentuan</a> <br>
        <a class="btn btn-lg mt-3" href="{{url('/daftar-vaksin')}}" role="button">Bersedia Sekarang</a>
      </div>
    </div>

    <div class="col-md-6">
      <img src="{{asset('assets/user/indexuser.png')}}" width="100%" height="100%" class="float-right" alt="">
    </div>
  </div>
</div>
@endsection
