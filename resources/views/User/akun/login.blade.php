@extends('Template.template_login')
@section('title','goVaksin | Masuk')
@section('content')
  <div class="card-body ">
      <h5 class="card-title text-center">Login</h5>
      <form action="{{ url('login') }}" method="POST">
        @csrf
        @method('post')
          @if(Session::get('msg'))
            <div class="text-danger">
              <h6>{{Session::get('msg')}}</h6>
            </div>
          @endif
          <div class="form-group">
              <input type="email" name="email" class="@error('email') is-invalid  @enderror form-control" placeholder="Email" autocomplete="off" autofocus>
              @error('email')
                  <div class="alert alert-danger border-0 bg-transparent">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <input type="password" name="password" class="form-control @error('password') is-invalid  @enderror" placeholder="Password">
              @error('password')
                  <div class="alert alert-danger border-0 bg-transparent">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-check my-3 ml-1">
              <input class="form-check-input" type="checkbox" name="remember">
              <label class="form-check-label" data-toggle="tooltip" data-placement="bottom" title="Indonesia Bebas Corona">
              Remember me
              </label>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">LOGIN</button>
      </form>
      <div class="mt-4 text-center">
        <span>Belum Punya akun ?</span>
      </div>
      <a href="{{url('/daftar')}}" class="btn btn-lg btn-danger btn-block mt-2" type="submit" name="submit">REGISTER</a>
      <div class="back-home text-center pt-3">
        <span><a href="{{url('/')}}">Kembali Ke Halaman Utama</a></span>
      </div>
  </div>
@endsection
