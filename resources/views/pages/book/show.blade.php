@extends('layouts.app')

@section('title', 'Detail Data Buku page')

@section('content')
<div class="container py 4">
    <h1>Detail Data Buku</h1>
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>{{ $book->no }}</th>
        </tr>
        <tr>
            <th>Kode Buku</th>
            <th>{{ $book->kode_buku }}</th>
        </tr>
        <tr>
            <th>Stok</th>
            <th>{{ $book->stok }}</th>
        </tr>
    </table>

    <a href="{{ route('admin.book.index', $book->id) }}" class="btn btn mb-3" style="background-color : #FFFDD0">Kembali</a>
</div>
@endsection