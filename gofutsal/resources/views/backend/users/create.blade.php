@extends('backend.layouts.main')

@section('container')
<div class="col-lg-6 mb-5">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Entri User</h1>
</div>
<form method="post" action="/user-backend">
    @csrf 
    <div class="mb-2">
      <label for="name" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}">
      @error('name')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-2">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}">
      @error('email')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2">
      <label for="email" class="form-label">Email Verified</label>
      <input type="text" class="form-control @error('email_verified_at') is-invalid @enderror" name="email_verified_at" value="{{ old('email_verified_at') ?? now() }}">
      @error('email_verified_at')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2">
      <input type="hidden" name="email_verified_at" value="{{ now() }}">
    </div>
    <div class="mb-2">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}">
      @error('password')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-2">
      <label for="token" class="form-label">Token</label>
      <input type="text" class="form-control @error('remember_token') is-invalid @enderror" name="remember_token" value="{{ old('remember_token')}}">
      @error('remember_token')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-2">
      <input type="hidden" name="remember_token" value="{{ old('remember_token') ?? Str::random(10) }}">
    </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection