@extends('layouts.app')

@section('title', 'Detail Data Peminjaman page')

@section('content')
<div class="container py 4">
    <h1>Detail Data Peminjaman</h1>
     
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>{{ $loan->id }}</th>
        </tr>
        <tr>
            <th>Pengunjung Id</th>
            <th>{{ $loan->pengunjung_id }}</th>
        </tr>
        <tr>
            <th>Judul Buku</th>
            <th>{{ $loan->judul }}</th>
        </tr>
        <tr>
            <th>Tgl Pinjam - Kembali</th>
            <th>{{ $loan->tgl_pinjam }} - {{ $loan->tgl_kembali }}</th>
        </tr>
        <tr>
            <th>Status</th>
            <th>{{ $loan->status }}</th>
        </tr>
    </table>

    <a href="{{ route('admin.loan.index', $book->id) }}" class="btn btn mb-3" style="background-color : #FFFDD0">Kembali</a>
</div>
@endsection