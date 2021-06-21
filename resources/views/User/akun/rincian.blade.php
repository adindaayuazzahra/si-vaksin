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
  .card {
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      margin-bottom: 60px;
      font-size: 18px;
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
  }
  #home{
    font-size: 15pt!important;
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="row mt-3">
    <div class="col-md-10 mx-auto">
      <div id="printInvoice" class="card">
        <div class="card-title px-5 pt-5 text-center">
          <h2>INVOICE PEMBAYARAN</h2>
          <hr>
        </div>
        <div class="px-5 pb-5">
          
          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">ID Pembayaran</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->pembayaran->id_pembayaran}}</p>
            </div>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">ID Pendaftaran</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->id_pendaftaran}}</p>
            </div>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->pembayaran->tgl_pembayaran}}</p>
            </div>
          </div>
        
          <hr>

          <div class="form-group row mb-0 font-weight-bold">
            <label class="col-sm-3 col-form-label">Bill to</label>
            <div class="col-sm-9">
              <p>: </p>
            </div>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-9">
              <p>: {{$user->informasiuser->nik}}</p>
            </div>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
              <p>: {{$user->informasiuser->nama}}</p>
            </div>
          </div>

          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label">Alamat Lengkap</label>
            <div class="col-sm-9">
              <p>: {{$user->informasiuser->alamat}}</p>
            </div>
          </div>

          <div class="form-group row mb-2">
            <label class="col-sm-3 col-form-label">Rumah Sakit</label>
            <div class="col-sm-9">
              <p>: {{$registrasi->rs->nama_rs}}</p>
            </div>
          </div>

          <br>
          <br>
          <br>
          
          <div class="row px-4 font-weight-bold">
            <div class="col-md-6">
              <p>Vaksin</p>
            </div>

            <div class="col-md-6 text-md-right">
              <p>Harga</p>
            </div>
          </div>

          <div class="row content m-0 font-weight-bold">
            
            <div class="col-md-6">
              <div class="pt-2">
                <p>{{$registrasi->vaksin->nama_vaksin}}</p>
              </div>
            </div>

            <div class="col-md-6 text-md-right">
              <div class="pt-2">
                <p>Rp. {{$registrasi->vaksin->harga}}</p>
              </div>
            </div>
          </div>

          <div class="col-md-12 text-md-right my-5">
            <h4 class="font-weight-bold">Total Pembayaran : Rp. {{$registrasi->pembayaran->total_harga}}</h4>
          </div>

        </div>
      </div>

      <div class="col-md-12 mx-auto text-md-center mb-5 cetak">
        <button onclick="printDiv()" class="btn btn-secondary text-white mb-5">CETAK BUKTI BAYAR</button>
        <a id="home" class="nav-link text-white" href="{{url('/')}}">Kembali ke halaman utama</a>
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

@section('script')
<script>
  function printDiv() {
     var printContents = document.getElementById("printInvoice").innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
  }
</script>
@endsection