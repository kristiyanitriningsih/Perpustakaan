@extends('layouts.app')

@section('title', 'Peminjaman page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 pt-3">
        <h1 class="h3 mb-0 text-gray-800">Halaman Data Peminjaman</h1>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Data Peminjaman</h5>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PENGUNJUNG ID</th>
                        <th>JUDUL BUKU</th>
                        <th>TGL PINJAM - KEMBALI</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loan as $loan)
                        <tr>
                            <td>{{ $loan->id }}</td>
                            <td>{{ $loan->pengunjung_id }}</td>
                            <td>{{ $loan->judul }}</td>
                            <td>{{ $loan->tgl_pinjam }} - {{ $loan->tgl_kembali }}</td>
                            <td>{{ $loan->status }}</td>
                            <td>
                                <a href="{{ route('admin.loan.show', $loan->id) }}" class="btn btn-link text-secondary p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                               <form action="{{ route('admin.loan.destroy', $loan->id) }}" method="POST" class="d-inline" onsubmit="return">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 mx-2 text-danger" style="background-color : #FFFDD0">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="" class="btn btn mb-3" style="background-color : #FFFDD0">Kembali</a>
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

    function handleDestroy(url) {
        Swal.fire({
            title: "Apakah Anda Yakin!",
            text: "Kamu Tidak Bisa Mengembalikan Data Yang telah di hapus!"
            icon: "Warning",
            showCancelButton: "Ya Hapus",
            cancelbuttonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-destroy').attr('action', url);
                $('#form-destroy').submit();
                
            }
        });
    }
    </script>
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ Session::get('success')}}",
                icon: "success",
                timer: "2000",
                showConfirmButton: false
            });
        </script>
    @endif
@endpush