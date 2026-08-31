@extends('layouts.app')

@section('title', 'Admin page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 pt-3">
        <h1 class="h3 mb-0 text-gray-800">Halaman Admin </h1>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Data Admin</h5>
            <a href="{{ route('admin.admin.create') }}" class="btn btn" style="background-color : #FFFDD0">
                <span class="fa fa-plus-circle mr-2"></span>
                <span>Tambah Admin</span>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.admin.show', $user->id) }}" class="btn btn-link text-secondary p-0 mx-2">
                                    <span class="fa fa-search"></span>
                                </a>
                                <a href="{{ route('admin.admin.edit', $user->id) }}" class="btn btn-link p-0 mx-2">
                                    <span class="fa fa-edit"></span>
                                </a>
                               <form action="{{ route('admin.admin.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return">
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