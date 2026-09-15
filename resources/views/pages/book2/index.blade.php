@extends('layouts.app')

@section('title', 'Data Buku page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 pt-3">
        <h1 class="h3 mb-0 text-gray-800">Halaman Data Buku</h1>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Data Buku</h5>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>FOTO</th>
                        <th>KODE BUKU</th>
                        <th>JUDUL</th>
                        <th>PENGARANG</th>
                        <th>PENERBIT</th>
                        <th>STOK</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$book->count())
                    <tr>
                        <td colspan="7" class="text-center">
                            Data products is empty...
                        </td>
                    </tr>
                    @endif

                    @foreach ($book as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>
                                @if ($book->foto)
                                    <img src="{{ asset('storage/uploads/' . $book->foto) }}" width="80px">
                                @else
                                    <em class="text-muted">Empty Image</em>
                                @endif
                            </td>
                            <td>{{ $book->kode_buku }}</td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->pengarang }}</td>
                            <td>{{ $book->penerbit }}</td>
                            <td>{{ $book->stok }}</td>
                            <td>
                                <a href="{{ route('admin.book.show', $book->id) }}" class="btn btn-link text-secondary p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" />
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $('.datatable').dataTable();
    </script>
@endpush