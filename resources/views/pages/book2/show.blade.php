@extends('pages.dashboard2.app')

@section('title', 'Detail Data Buku page')

@section('content')
<div class="container py 4">
    <h1>Detail Data Buku Perpustakaan</h1>
                        
    <table class="table table-bordered">
        <tr>
            <th>Kode Buku</th>
            <th>{{ $book->kode_buku }}</th>
        </tr>
        <tr>
            <th>Judul</th>
            <th>{{ $book->judul }}</th>
        </tr>
        <tr>
            <th>Pengarang</th>
            <th>{{ $book->pengarang }}</th>
        </tr>
        <tr>
            <th>Penerbit</th>
            <th>{{ $book->penerbit }}</th>
        </tr>
        <tr>
            <th>Stok</th>
            <th>{{ $book->stok }}</th>
        </tr>
    </table>

    <a href="{{ route('book2.index', $book->id) }}" class="btn btn mb-3" style="background-color : #FFFDD0">Kembali</a>
</div>
@endsection