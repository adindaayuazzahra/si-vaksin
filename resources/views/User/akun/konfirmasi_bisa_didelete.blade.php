@extends('Template.template_web')
@section('title','goVaksin | Konfirmasi')
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
  .card-title {
      font-weight: bolder;
      font-family: 'Prata', serif;
  }
  .card {
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      margin-bottom: 60px;
      font-size: 18px;
  }
  hr {
    border: none;
    height: 2px;
    background-color: rgb(0, 0, 0);
  }
  footer {
    background: #7e21ff;
    color: white;
  }
  .form-control {
    border:#ffff;
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="row mt-3">
    <div class="col-md-12 mx-auto">
      <div class="card ">
        <div class="card-title px-5 pt-5 text-center">
          <h2>KONFIRMASI PENDAFTRAN</h2>
          <hr>
        </div>
        <form class="px-5 pb-5 pt-3" action="" method="POST">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" name="nik" class="form-control" value=": 1938293529845832">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" name="nama" class="form-control" value=": Adinda Ayu Azzahra">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
            <div class="col-sm-10">
              <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" rows="3">: Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam repellendus recusandae dicta commodi quas quo qui doloremque odio dolor ea, deleniti, atque at sit consequatur?</textarea>
              <p></p>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Vaksin</label>
            <div class="col-sm-10">
              <input class="form-control" name="vaksin" value=": Astra Zanecca">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Rumah Sakit</label>
            <div class="col-sm-10">
              <input class="form-control" name="rs"value=": RS Cipto Mangunkusumo">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="" name="tgl" class="form-control" value=": 20/05/2021">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jam</label>
            <div class="col-sm-10">
              <input type="" name="time" class="form-control" value=": 13.30">
            </div>
          </div>

          <button type="submit" class="btn  btn-primary mx-auto d-flex mt-2">Daftar dan Bayar</button>
          <button type="submit" class="btn  btn-info mx-auto d-flex mt-2">Masih Ada Data yang Salah</button>
          
        </form>
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