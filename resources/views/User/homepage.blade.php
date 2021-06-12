@extends('Template.template_web')
@section('title','goVaksin | Home')
@section('content')
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
@endsection