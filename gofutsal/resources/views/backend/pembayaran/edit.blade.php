@extends('backend.layouts.main')

@section('container')
<div class="col-lg-6 mb-5">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Pembayaran</h1>
  </div>
  <form method="post" action="/pembayaran-backend/{{$pembayarans->id}}">
    @method('PUT')
    @csrf 
    <div class="mb-3 row">
      <label for="nama" class="col-sm-2 col-form-label " >Nama</label>
      <div class="col-sm-10">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name='nama' id="nama" value="{{ old('nama',$pembayarans->nama)}}">
          @error('nama')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
  </div>
  <div class="mb-3 row">
    <label for="jurusan" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
</div>
@endsection