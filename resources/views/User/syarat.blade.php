@extends('Template.template_web')
@section('title','goVaksin | Syarat dan Ketentuan')
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
  }
  .a {
    list-style-type: lower-roman;
  }
  footer {
    background: #7e21ff;
  }
  @media (max-width: 580px) {
    .judul {
      font-size: 18pt;
    }
    .card {
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      margin-bottom: 60px;
      font-size: 12pt;
    }
    .card-title h4 {
      font-size: 14pt;
    }
  }
</style>
@endsection

@section('content')
<div class="container">
  <div class="col-md-12">
    <p class="judul">Syarat dan Ketentuan Vaksinasi COVID-19</p>
    <div class="row mt-3">
      <div class="col-md-12">
        <div class="card bg-info">
          <div class="card-title mt-4 ml-4 mr-4">
            <h4 class="font-weight-bold">Persyaratan dan Ketentuan Umum</h4>
          </div>
          <div class="card-body mr-3 mb-3">
            <ol>
              <li>Jika pernah terpapar COVID-19 dan sudah sembuh lebih dari tiga bulan, bisa diberikan vaksinasi.</li>
              <li>Berusia di atas 18 tahun. Kelompok lanjut usia (lansia), sudah bisa mendapatkan persetujuan untuk diberikan vaksin COVID-19.</li>
              <li>Bagi ibu hamil vaksinasi masih harus ditunda. Jika ingin melakukan perencanaan kehamilan, bisa dilakukan setelah mendapat vaksinasi kedua COVID-19.</li>
              <li>Ibu menyusui sudah bisa mendapat vaksinasi.</li>
              <li>Tekanan darah harus di bawah 180/110 mmHg.</li>
              <li>Syarat penerima vaksin COVID-19 yang keenam adalah, para pengidap penyakit kronik, seperti PPOK, asma, penyakit jantung, penyakit gangguan ginjal, penyakit hati yang sedang dalam kondisi akut atau belum terkendali, vaksinasi ditunda dan tidak bisa diberikan.</li>
              <li>Pada vaksinasi pertama, untuk orang-orang yang memiliki riwayat alergi berat karena vaksin, vaksinasi harus diberikan di rumah sakit. Tetapi, jika reaksi alergi tersebut didapatkan setelah vaksinasi pertama, tidak akan diberikan lagi vaksinasi kedua.</li>
              <li>Untuk orang yang menerima vaksinasi lain selain COVID-19, vaksinasi harus ditunda sampai satu bulan setelah vaksinasi sebelumnya.</li>
              <li>Khusus kelompok lansia yang lebih dari 60 tahun, ada 5 kriteria yang akan ditanyakan untuk menentukan layak divaksinasi, yaitu:
                <ol class="a">
                  <li>Apa mengalami kesulitan saat naik 10 anak tangga?</li>
                  <li>Apa sering mengalami kelelahan?</li>
                  <li>Memiliki paling sedikit 5 dari 11 penyakit, misalnya diabetes, kanker, paru kronis, serangan jantung, nyeri dada, nyeri sendi, gagal jantung kongestif, stroke, penyakit ginjal, hipertensi, asma. Jika hanya memiliki 4 di antaranya, masih tidak bisa divaksinasi COVID-19.</li>
                  <li>Apa sering mengalami kesulitan berjalan, kira2 100-200 meter?</li>
                  <li>Adanya penurunan badan yang signifikan dalam satu tahun terakhir?</li>
                </ol>
              </li>
            </ol>
          </div>
        </div>


        <div class="card bg-info">
          <div class="card-title mt-4 ml-4 mr-4">
            <h4 class="font-weight-bold">Persyaratan dan Ketentuan Bagi Pengidap Penyakit</h4>
          </div>
          <div class="card-body mr-3 mb-3">
            <ol>
              <li>Untuk pengidap penyakit kronik, seperti PPOK, asma, penyakit jantung, penyakit gangguan ginjal, penyakit hati yang sedang dalam kondisi akut atau belum terkendali, vaksinasi tidak bisa diberikan. Terkecuali : 
                <ol class="a">
                  <li>Jika sudah berada dalam kondisi terkendali, diharapkan membawa surat keterangan layak untuk mendapat vaksinasi dari dokter yang merawat.</li>
                  <li>Untuk penderita TBC yang sudah menjalani pengobatan lebih dari dua minggu juga sudah bisa divaksinasi.</li>
                </ol>
              </li>
              <li>Jika sedang mendapat terapi kanker, maka diwajibkan untuk membawa surat keterangan layak divaksinasi dari dokter yang merawat.</li>
              <li>Bagi pengidap penyakit autoimun sistemik, vaksinasi harus ditunda dan harus dikonsultasikan pada dokter yang merawat.</li>
              <li>Bagi pengidap gangguan pembekuan darah, defisiensi imun, dan penerima produk darah/transfusi, vaksinasi harus ditunda. Vaksinasi COVID-19 bisa diberikan setelah melakukan konsultasi pada dokter yang merawat.</li>
              <li>Bagi pengidap penyakit epilepsi atau ayan, vaksinasi bisa dilakukan jika dalam keadaan terkontrol.</li>
            </ol>
          </div>
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
@endsection