@extends('layouts.main')
@section('title', 'Login')
@section('navLogin', 'active')

@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">ID Lapangan</th>
                <th class="col-md-4">Lokasi</th>
                <th class="col-md-2">Gambar</th>
                <th class="col-md-2">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lapangans as $lapangan)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$lapangan->nama}}</td>
                <td>{{$lapangan->lokasi}}</td>
                <td><img src="/img/{{$lapangan->file_upload}}" alt="gambar" width="150px" class="rounded"></td>
                <td>{{$lapangan->keterangan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$lapangans->links()}}
</div>
@endsection
