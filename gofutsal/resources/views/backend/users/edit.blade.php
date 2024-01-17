@extends('backend.layouts.main')

@section('container')
<div class="col-lg-6 mb-5">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data User</h1>
</div>
<form method="post" action="/user-backend/{{$users->id}}">
    @method('PUT')
    @csrf 
    <div class="mb-2">
      <label for="name" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $users->name) }}">
      @error('name')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    
    <div class="mb-2">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $users->email) }}">
      @error('email')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>
    
    <div class="mb-2">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $users->password) }}">
      @error('password')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>    
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection