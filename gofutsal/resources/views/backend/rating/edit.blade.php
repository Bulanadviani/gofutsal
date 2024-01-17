@extends('backend.layouts.main')

@section('container')
<div class="col-lg-6 mb-5">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Rating</h1>
  </div>
  <form method="post" action="/rating-backend/{{$ratings->id}}">
    @method('PUT')
    @csrf
    <div class="mb-2">
        <label for="user_id" class="form-label">Nama</label>
        <select class="form-select @error('user_id') is-invalid @enderror" name="user_id">
          @foreach($users as $user)
          @if(old('user_id')== $user->id)
          <option value="{{$user->id}}" selected>{{$user->name}}</option>
          @else
          <option value="{{$user->id}}">{{$user->name}}</option>
          @endif
          @endforeach
        </select>
        @error('user_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

            <div class="mb-3 row">
                <label for="ulasan" class="col-sm-2 col-form-label">Ulasan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('ulasan') is-invalid @enderror" name='ulasan' id="ulasan" value="{{ old('ulasan')}}">
                    @error('ulasan')
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
        </div>
    </form>
   
        <!-- AKHIR FORM -->
@endsection          