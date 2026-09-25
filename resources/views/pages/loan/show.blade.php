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
            <th>Nomor Telephone</th>
            <th>{{ $loan->no_telp }}</th>
        </tr>
        <tr>
            <th>Judul Buku</th>
            <th>{{ $loan->book->judul ?? '_' }}</th>
        </tr>
        <tr>
            <th>Tanggal Pinjam</th>
            <th>{{ $loan->tgl_pinjam }}</th>
        </tr>
        <tr>
            <th>Tanggal Kembali</th>
            <th>{{ $loan->tgl_kembali }}</th>
        </tr>
        <tr>
            <th>Status</th>
            <th>{{ $loan->status }}</th>
        </tr>
    </table>

    <a href="{{ route('admin.loan.index') }}" class="btn btn mb-3" style="background-color : #FFFDD0">Kembali</a>
</div>
@endsection