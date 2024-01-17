@extends('backend.layouts.main')

@section('container')
<form method="post" action="/pemesanan-backend">
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

        <div class="mb-2">
            <label for="lapangan_id" class="form-label">Lapangan</label>
            <select class="form-select @error('lapangan_id') is-invalid @enderror" name="lapangan_id">
              @foreach($lapangans as $lapangan)
              @if(old('lapangan_id')== $lapangan->id)
              <option value="{{$lapangan->id}}" selected>{{$lapangan->nama}}</option>
              @else
              <option value="{{$lapangan->id}}">{{$lapangan->nama}}</option>
              @endif
              @endforeach
            </select>
            @error('lapangan_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

           <div class="mb-2">
            <label for="peralatan_id" class="form-label">Peralatan</label>
            <select class="form-select @error('peralatan_id') is-invalid @enderror" name="peralatan_id">
              @foreach($peralatans as $peralatan)
              @if(old('peralatan_id')== $peralatan->id)
              <option value="{{$peralatan->id}}" selected>{{$peralatan->nama_barang}}</option>
              @else
              <option value="{{$peralatan->id}}">{{$peralatan->nama_barang}}</option>
              @endif
              @endforeach
            </select>
            @error('peralatan_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>


          <div class="mb-3 row">
            <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='waktu' id="waktu">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='harga' id="harga">
            </div>
        </div>  

        <div class="mb-2">
            <label for="pembayaran_id" class="form-label">pembayaran</label>
            <select class="form-select @error('pembayaran_id') is-invalid @enderror" name="pembayaran_id">
              @foreach($pembayarans as $pembayaran)
              @if(old('pembayaran_id')== $pembayaran->id)
              <option value="{{$pembayaran->id}}" selected>{{$pembayaran->nama}}</option>
              @else
              <option value="{{$pembayaran->id}}">{{$pembayaran->nama}}</option>
              @endif
              @endforeach
            </select>
            @error('pembayaran_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>
          <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    
    </form>
        <!-- AKHIR FORM -->
@endsection          
    