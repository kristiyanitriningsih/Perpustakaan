@extends('pages.dashboard2.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <h4>Formulir Peminjaman</h4>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.loan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Nomor Telephone</label>
                                    <input type="integer" name="no_telp" class="form-control" value="{{ old('no_telp') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Kode Buku</label>
                                    <input type="varchar" name="kode_buku" class="form-control" value="{{ old('kode_buku') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" name="tgl_pinjam" class="form-control" value="{{ old('tgl_pinjam') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Tanggal Kembali</label>
                                    <input type="date" name="tgl_kembali" class="form-control" value="{{ old('tgl_kembali') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Jumlah</label>
                            <input type="varchar" name="jumlah" class="form-control" value="{{ old('jumlah') }}">
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="width: 50%;">
                                <a href="{{ route('book2.index') }}" class="fas fa-times me-2"></a> Batal
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg" style="width: 50%;">
                                <i class="fas fa-save me-2"></i> Pinjam
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection