@extends('layouts.app')

@section('content')
<h4>Selamat Datang!</h4>
<h5>Berikut daftar buku yang sering dipinjam di perpustakaan :</h5>

<div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>JUDUL BUKU</th>
                        <th>TOTAL PINJAM</th>
                        <th>GENRE</th>
                    </tr>
                </thead>
            </table>
        </div>
@endsection
