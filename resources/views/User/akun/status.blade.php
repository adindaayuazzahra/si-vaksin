@extends('Template.template_web')
@section('title','goVaksin | Syarat dan Ketentuan')
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
  .kartu1 {
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      margin-bottom: 60px;
      font-size: 18px;
  }
  .kartu2 {
    border-radius: 10px;
    margin-bottom: 60px;
    background-color: #C4C4C4;
  }
  .card-title {
      font-weight: bolder;
      font-family: 'Prata', serif;
  }
  hr {
    border: none;
    height: 2px;
    background-color: rgb(0, 0, 0);
  }
  .row .content {
    background: #98a2b3;
  }
  footer {
    background: #7e21ff;
    color: white;
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="row mt-3">
    <div class="col-md-10 mx-auto">
      <div class="card kartu1">
        <div class="card-title px-5 pt-5 mb-0 text-center">
          <h2>STATUS VAKSINASI</h2>
          <hr>
        </div>
        <?php $count=1; ?>
        @foreach($registrasi as $registrasi)
        <div class="card kartu2 mx-5 p-4 font-weight-bold">
          
          <div class="form-group row mb-0 ">
            <label class="col-sm-3 col-form-label">#<?php echo ($count++); ?></label>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">ID Pendaftaran</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->id_pendaftaran}}</p>
            </div>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <p>: {{$akun->nama}}</p>
            </div>
          </div>

          <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Vaksin</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->vaksin->nama_vaksin}}</p>
            </div>
          </div>

          <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Rumah Sakit</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->rs->nama_rs}}</p>
            </div>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">Tanggal Pendaftaran</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->tgl_pendaftaran}}</p>
            </div>
          </div>

          <div class="mx-auto mt-2">
            @if(!empty($registrasi->status->status))
              <h3><span class="badge badge-pill badge-info">{{$registrasi->status->status}}</span></h3>
            @else
              <h3><span class="badge badge-pill badge-info"></span></h3>
            @endif
          </div>
          
        </div>
        @endforeach
      </div>
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