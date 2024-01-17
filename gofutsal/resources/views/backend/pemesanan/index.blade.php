@extends('backend.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pemesanan</h1>
</div>
@if (session()->has('pesan'))
    <div class="alert alert-success mt-3" role="alert">
        {{session('pesan')}}
    </div>
@endif
<a href="/pemesanan-backend/create" class="btn btn-primary"> <span data-feather="plus-circle"></span>
    Tambah Pemesanan </a>
    <table class="table table-bordered table-sm my-4">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-4">Nama Lapangan</th>
                <th class="col-md-2">Waktu</th>
                <th class="col-md-2">Peralatan</th>
                <th class="col-md-2">Harga</th>
                <th class="col-md-2">Pembayaran</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanans as $pemesanan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pemesanan->user->name}}</td>
                <td>{{$pemesanan->lapangan->nama}}</td>
                <td>{{$pemesanan->waktu}}</td>
                <td>{{ optional($pemesanan->peralatan)->nama_barang }}</td>
                <td>{{$pemesanan->harga}}</td>
                <td>{{$pemesanan->pembayaran->nama}}</td>
                <td>
                    <a href="/pemesanan-backend/{{ $pemesanan->id }}/edit" class="btn btn-warning btn-sm"> <span data-feather="edit">
                    </span>Edit</a>
                    <form action="/pemesanan-backend/{{$pemesanan->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')"><span data-feather="trash-2"></span>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$pemesanans->links()}}
@endsection
