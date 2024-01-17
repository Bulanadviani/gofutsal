@extends('backend.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Pembayaran</h1>
</div>
@if (session()->has('bayar'))
    <div class="alert alert-success mt-3" role="alert">
        {{session('pesan')}}
    </div>
@endif
<a href="/pembayaran-backend/create" class="btn btn-primary"> <span data-feather="plus-circle"></span>
    Tambah Pembayaran </a>
    <table class="table table-bordered table-sm my-4">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Jenis Pembayaran</th>
                <th class="col-md-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pembayaran->nama}}</td>
                <td>
                    <a href="/pembayaran-backend/{{ $pembayaran->id }}/edit" class="btn btn-warning btn-sm"> <span data-feather="edit">
                    </span>Edit</a>
                    <form action="/pembayaran-backend/{{$pembayaran->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')"><span data-feather="trash-2"></span>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$pembayarans->links()}}
@endsection
