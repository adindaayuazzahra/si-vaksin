@extends('Template.template_login')
@section('title','goVaksin | Admin Login')
@section('content')
  <div class="card-body">
      <h5 class="card-title text-center"> Admin Login</h5>
      <form action="{{ url('login-admin') }}" method="POST">
        @csrf
        @method('post')
          @if(Session::get('msg'))
            <div class="text-danger">
              <h6>{{Session::get('msg')}}</h6>
            </div>
          @endif
          <div class="form-group">
              <input type="text" name="username" class="@error('username') is-invalid  @enderror form-control" placeholder="Username" autocomplete="off" autofocus>
              @error('username')
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
              <label class="form-check-label">
              Remember me
              </label>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">LOGIN</button>
      </form>
      <div class="back-home">
        <span class="text-center"><a href="{{url('/')}}">Kembali Ke Halaman Utama</a></span>
      </div>
  </div>
@endsection