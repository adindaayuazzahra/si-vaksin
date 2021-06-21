@extends('Template.template_web')
@section('title','goVaksin | Harga Vaksin')
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
  .judul {
      font-weight: bolder;
      font-size: 45px;
      text-align: center;
      font-family: 'Prata', serif;
      color: white;
  }
  .card {
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      font-size: 18px;
      height: 36rem;
  }
  .card .card-title {
      font-weight: 700;
      font-size: 14pt;
  }
  .card img{
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    
  }
  footer {
    background: #7e21ff;
    color: white;
  }

</style>
@endsection
@section('content')
<div class="container">
  <div class="col">
    <p class="judul">List Harga Vaksin</p>
  </div>
  <div class="row">
   
   @foreach($list_vaksin as $vaksin)
    <div class="col-md-6 col-xl-4 mb-5">
      <div class="card border-0">
        <img class="card-img-top w-100" src="{{asset('assets/vaksin/img/'.$vaksin->img)}}" alt="Card image cap" height="200">
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-syringe"></i> {{$vaksin->nama_vaksin}}<hr class="card-title"></h5>
          <strong>Efek Samping:</strong>
          <ul class="card-text">
            {!!$vaksin->deskripsi!!}
          </ul>
          <h3><span class="badge badge-pill badge-info">@currency($vaksin->harga)</span></h3>
        </div>
      </div>
    </div>
  @endforeach
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