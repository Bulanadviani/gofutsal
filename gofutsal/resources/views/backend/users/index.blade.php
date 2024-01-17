@extends('backend.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar User</h1>
</div>
@if (session()->has('pesan'))
    <div class="alert alert-success mt-3" role="alert">
        {{session('pesan')}}
    </div>
@endif
<a href="/user-backend/create" class="btn btn-primary"> <span data-feather="plus-circle"></span>
    Create User </a>
    <table class="table table-bordered table-sm my-4">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        @foreach ($users as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>
                <a href="/user-backend/{{ $item->id }}/edit" class="btn btn-warning btn-sm"> <span data-feather="edit">
                </span>Edit</a>
                <form action="user-backend/{{$item->id }}" method="post" class="d-inline">
                @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ?')"><span data-feather="trash-2"></span>Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$users->links()}}
@endsection