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
                        <th>NOMOR TELEPHONE</th>
                        <th>JUDUL BUKU</th>
                        <th>TANGGALL PINJAM</th>
                        <th>TANGGAL KEMBALI</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loan as $loan)
                        <tr>
                            <td>{{ $loan->id }}</td>
                            <td>{{ $loan->no_telp }}</td>
                            <td>{{ $loan->book->judul ?? '_' }}</td>
                            <td>{{ $loan->tgl_pinjam }}</td>
                            <td>{{ $loan->tgl_kembali }}</td>
                            <td>{{ $loan->status }}</td>
                            <td>
                                <a href="{{ route('admin.loan.show', $loan->id) }}" class="btn btn-link text-secondary p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                               <form id="delete-form-{{ $loan->id }}" action="{{ route('admin.loan.destroy', $loan->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link p-0 mx-2 text-danger" style="background-color : #FFFDD0" onclick="confirmDelete({{ $loan->id }})">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('admin.dashboard')}}" class="btn btn mb-3" style="background-color : #FFFDD0">Kembali</a>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    
    <script type="text/javascript">
        $('.datatable').dataTable();

        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah Anda Yakin!",
                text: "Kamu Tidak Bisa Mengembalikan Data Yang telah di hapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya Hapus",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ Session::get('success') }}",
                icon: "success",
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "{{ Session::get('error') }}",
                icon: "error",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
        </script>
    @endif
@endpush