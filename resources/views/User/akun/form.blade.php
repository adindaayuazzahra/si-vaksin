@extends('Template.template_web')
@section('title','goVaksin | Pendaftaran Vaksin')
@section('css')
<style>
  body{
      font-family: 'Lato', sans-serif;
      background-color: #a25eff;
      color: white;
  }
  .navbar {
      background-color: #7e21ff;
  }
  .container {
      margin-top: 50px;
  }
  .judul {
      font-weight: bolder;
      font-size: 40px;
      text-align: center;
      font-family: 'Prata', serif;
  }
  .card {
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      margin-bottom: 60px;
      font-size: 18px;
      color: black;
  }
  .a {
    list-style-type: lower-roman;
  }
  footer {
    background: #7e21ff;
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="col-md-12">
    <p class="judul">Form Pendaftaran Vaksinasi</p>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card">

          <form class="p-5" action="{{ url('/daftar-vaksin') }}" method="POST">
            @csrf
            @method('post')
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">NIK</label>
              <div class="col-sm-10">
                <input type="text" name="nik" class="form-control" placeholder="NIK">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" value="{{$akun->nama}}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
              <div class="col-sm-10">
                <textarea type="text" name="alamat" class="form-control" placeholder="Alamat" rows="3"></textarea>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Vaksin</label>
              <div class="col-sm-10">
                <select class="form-control" name="vaksin" id="exampleFormControlSelect1">
                  <option>-- Pilih Jenis Vaksin --</option>
                  @foreach($list_vs as $vs)
                    <option value="{{$vs->id_vaksin}}">{{$vs->nama_vaksin}} - Rp. {{$vs->harga}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Rumah Sakit</label>
              <div class="col-sm-10">
                <select class="form-control" name="rs" id="exampleFormControlSelect2" onchange="loadPreviewOption(event)">
                  <option>-- Pilih Rumah Sakit --</option>
                  @foreach($list_rs as $rs)
                    <option value="{{$rs->id_rs}}">{{$rs->nama_rs}}  Jadwal: {{$rs->jadwal}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="date" name="tgl" class="form-control">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Jam</label>
              <div class="col-sm-10">
                <input type="time" name="time" class="form-control">
              </div>
            </div>

            <button type="submit" class="btn btn-lg btn-primary float-right mt-2 ">Konfirmasi</button>

          </form>
        </div>
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
          <p>goVaksin adalah sebuah aplikasi berbasis web yang bergerak di bidang kesehatan serta berkerja sama dengan beberapa pihak rumah sakit untuk memudahkan masyarakat dalam mendapatkan vaksinnasi Covid-19.</p>
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
<script>
  
</script>
@endsection