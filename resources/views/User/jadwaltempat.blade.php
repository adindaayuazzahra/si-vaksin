@extends('Template.template_web')
@section('title','goVaksin | Jadwal & Tempat')
@section('css')
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
      border: 0;
      height: 30rem;
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
  @media (min-width: 770px) {
    .card {
        width: 28rem;
    } 
    .card .card-title {
        font-size: 18pt;
    }
    .judul {
        font-size: 45px;
    }
    .card-text {
        font-size: 13pt;
    }
  }
  @media (min-width: 771px) and (max-width: 1025px) {
    .card {
        width: 24rem;
    }
    .card .card-title {
        font-size: 16pt;
    }
    .judul {
        font-size: 30px;
    }
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="col-md-12">
    <p class="judul">Jadwal Dan Tempat Vaksinasi COVID-19</p>
    <div class="row mt-4">
      @foreach($list_rs as $rs)
      <div class="col-md-5 m-auto d-block">
        <div class="card mb-5">
          <img class="w-100" src="{{asset('assets/rs/img/'.$rs->img)}}" alt="Card image cap" height="300">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-hospital"></i> {{$rs->nama_rs}}</h5>
            <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{$rs->alamat}}</p>
            <p class="card-text"><i class="fas fa-phone"></i> Telephone : {{$rs->no_telephone}}</p>
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
  
@endsection

@section('footer')
<footer class="text-center text-lg-start">
  <section class="content-footer pt-1 pb-2">
    <div class="container text-center text-md-start mt-5">
      <div class="row">
        <div class="col-md-5 col-sm-12 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-hospital-alt"></i> goVkasin
          </h6>
          <p>goVaksin adalah sebuah aplikasi berbasis web yang bergerak di bidang kesehatan serta berkerja sama dengan beberapa pihak rumah sakit untuk memudahkan masyarakat dalam mendapatkan vaksinasi Covid-19.</p>
        </div>
        <div class="col-md-5 col-sm-12 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Jakarta, Indonesia.</p>
          <p><i class="fas fa-envelope me-3"></i> govaksin@email.com</p>
          <p><i class="fas fa-phone me-3"></i> +62 21 4294875</p>
          <p><i class="fas fa-print me-3"></i> +62 21 4294875</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright: goVaksin.test
  </div>
</footer>  
@endsection