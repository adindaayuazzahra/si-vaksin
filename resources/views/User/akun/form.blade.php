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
    color: white;
  }

  .form-section{
    display: none;
  }
  .form-section.current{
    display: inherit;
  }

  .parsley-errors-list{
    margin: 2px;
    padding: 0;
    list-style-type: none;
    color: red;
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

          <form id="registrasiForm" class="p-5" action="{{ url('/daftar-vaksin') }}" method="POST">
            @csrf
            @method('post')
            <div class="form-section">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input id="nik" type="text" name="nik" class="form-control" placeholder="NIK" value="@if($informasiuser){{$informasiuser->nik}}@endif">
                  <span id="nikError" class="text-danger"></span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input id="nama" type="text" name="nama" class="form-control" value="@if($akun){{$akun->nama}}@endif">
                  <span id="namaError" class="text-danger"></span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10">
                  <textarea id="alamat" type="text" name="alamat" class="form-control" placeholder="Alamat" rows="3">@if($informasiuser){{$informasiuser->alamat}}@endif</textarea>
                  <span id="alamatError" class="text-danger"></span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Vaksin</label>
                <div class="col-sm-10">
                  <select class="form-control" name="vaksin" id="vaksin">
                    <option>-- Pilih Jenis Vaksin --</option>
                    @foreach($list_vs as $vs)
                      <option value="{{$vs->id_vaksin}}">{{$vs->nama_vaksin}} - @currency($vs->harga)</option>
                    @endforeach
                  </select>
                  <span id="vaksinError" class="text-danger"></span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rumah Sakit</label>
                <div class="col-sm-10">
                  <select class="form-control" name="rs" id="rs">
                    <option>-- Pilih Rumah Sakit --</option>
                    @foreach($list_rs as $rs)
                      <option value="{{$rs->id_rs}}">{{$rs->nama_rs}}  Jadwal: {{$rs->jadwal}}</option>
                    @endforeach
                  </select>
                  <span id="rsError" class="text-danger"></span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input id="tgl" type="date" name="tgl" class="form-control">
                  <span id="tglError" class="text-danger"></span>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jam</label>
                <div class="col-sm-10">
                  <input id="time" type="time" name="time" class="form-control">
                  <span id="timeError" class="text-danger"></span>
                </div>
              </div>
            </div>

            <div class="form-section">
              <div class="card-title text-center">
                <h2 class="p-3">KONFIRMASI PENDAFTARAN</h2>
                <hr>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                  <input id="nik2" type="text" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input id="nama2" type="text" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10">
                  <textarea type="text" id="alamat2" class="form-control" placeholder="Alamat" rows="3"></textarea>
                  <p></p>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Vaksin</label>
                <div class="col-sm-10">
                  <input id="vaksin2" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rumah Sakit</label>
                <div class="col-sm-10">
                  <input class="form-control" id="rs2">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" id="tgl2" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jam</label>
                <div class="col-sm-10">
                  <input type="time" id="time2" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-navigation">
              <button type="button" class="next btn btn-lg btn-primary float-right mt-2" onclick="registrasi()">Konfirmasi</button>
              <button type="button" class="previous btn btn-info float-left mt-2">Masih Ada Data yang Salah</button>
              <button type="submit" name="submit" value="submit" class="btn btn-success float-right mt-2">Daftar dan Bayar</button>
            </div>
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
<script>
  
</script>
@endsection
@section('script')
<script>
  $(function(){
      var $sections=$('.form-section');

      function navigateTo(index){
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index);
        var atTheEnd = index >= $sections.length-1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [type=submit]').toggle(atTheEnd);
      }

      function curIndex(){
        return $sections.index($sections.filter('.current'));
      }

      $('.form-navigation .previous').click(function(){
        navigateTo(curIndex()-1);
      });

      $('.form-navigation .next').click(function(){
          $("#registrasiForm").parsley().whenValidate({
            group: 'block-'+curIndex()
          }).done(function(){
            navigateTo(curIndex()+1);
          });
      });

      $sections.each(function(index,section){
        $(section).find(':input').attr('data-parsley-group','block-'+index);
      });

      navigateTo(0);

  });

  function registrasi(){
    $("#nik2").val($("#nik").val());
    $("#nama2").val($("#nama").val());
    $("#alamat2").val($("#alamat").val());
    $("#vaksin2").val($("#vaksin").val());
    $("#rs2").val($("#rs").val());
    $("#tgl2").val($("#tgl").val());
    $("#time2").val($("#time").val());
  }
</script>
@endsection