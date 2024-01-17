@extends('layouts.main')
@section('title', 'Login')
@section('navLogin', 'active')

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">Nama Barang </th>
                <th class="col-md-4">Jumlah</th>
                <th class="col-md-2">Gambar</th>
                <th class="col-md-2">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peralatans as $peralatan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$peralatan->nama}}</td>
                <td>{{$peralatan->lokasi}}</td>
                <td><img src="/img/{{$peralatan->file_upload}}" alt="gambar" width="150px" class="rounded"></td>
                <td>{{$peralatan->keterangan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$peralatans->links()}}
</div>
@endsection
