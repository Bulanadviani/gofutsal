@extends('backend.layouts.main')

@section('container')
<div class="col-lg-6 mb-5">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Lapangan</h1>
  </div>
  <form method="post" action="/lapangan-backend/{{$lapangans->id}}">
    @method('PUT')
    @csrf 
    <div class="mb-3 row">
      <label for="nama" class="col-sm-2 col-form-label " >Nama Lapangan</label>
      <div class="col-sm-10">
          <input type="text" class="form-control @error('nama') is-invalid @enderror" name='nama' id="nama" value="{{ old('nama',$lapangans->nama)}}">
          @error('nama')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
  </div>

  <div class="mb-3 row">
      <label for="lokasi" class="col-sm-2 col-form-label">Lokasi Lapangan</label>
      <div class="col-sm-10">
          <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name='lokasi' id="lokasi" value="{{ old('lokasi',$lapangans->lokasi)}}">
          @error('lokasi')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
      </div>
  </div>
    
    <div class="mb-2">
      <input type="hidden" name="image_old" value="{{$lapangans->file_upload}}">
      <label for="file_upload" class="form-label">File Upload</label>
      @if ($lapangans->file_upload)
          <img id="file-preview" src="/img/{{$lapangans->file_upload}}" class="img-fluid col-sm-6 d-block mb-2" height="100">
      @else
          <img id="file_preview" class="img-fluid col-sm-6 d-block mb-2"  height="100">         
      @endif
      <img id="file-preview" class="img-fluid col-sm-6 mb-3 d-block" height="100">
      <input type="file" class="form-control @error('file_upload') is-invalid @enderror" name="file_upload" id="file-upload">
      @error('file_upload')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
    </div>    
    
    <div class="mb-3 row">
      <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
      <div class="col-sm-10">
          <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name='keterangan' id="keterangan" value="{{ old('lokasi',$lapangans->keterangan)}}">
          @error('keterangan')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
  </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <script>
    const input = document.getElementById('file-upload');
    const previewPhoto = () => {
        const file = input.files;
        if (file) {
            const fileReader = new FileReader();
            const preview = document.getElementById('file-preview');
    fileReader.onload = function (event) {
                preview.setAttribute('src', event.target.result);
            }
            fileReader.readAsDataURL(file[0]);
        }
    }
    input.addEventListener("change", previewPhoto);
  </script>
</div>
@endsection