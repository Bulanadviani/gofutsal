@extends('layouts.main')
@section('title','Login')
@section('navLogin','active')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card login-card">
              <div class="card-body">
                  <h2 class="card-title text-center">Login</h2>
                  <form method="post" action="/login">
                      @csrf

                      <div class="form-group">
                        <label for="email">Email:</label>
                          <input type="email" class="form-control @error('email') is-invalid
                    @enderror" value="{{ old('email') }}" name="email" id="email" required autofocus>
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror

                      <div class="form-group">
                          <label for="password">Password:</label>
                          <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
                      </div>
                      <br>
                      <div class="form-group">
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                      </div>

                      <p class="text-center">Belum punya akun? <a href="#">Daftar disini</a></p>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection