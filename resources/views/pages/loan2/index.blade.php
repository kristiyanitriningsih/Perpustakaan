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

                    {{-- <form action="{{ route('guest.store') }}" method="POST"> --}}
                        @csrf

                        <div class="mb-3">
                            <label>Nomor Pengunjung</label>
                            <input type="varchar" name="no_pengunjung" class="form-control" value="{{ old('no_pengunjung') }}">
                        </div>

                        <!-- Nomor Telepon dan Email dalam satu baris -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Kode Buku</label>
                                    <input type="varchar" name="kode_buku" class="form-control" value="{{ old('kode_buku') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Pinjam & Tanggal Kembali</label>
                            <textarea name="tgl_pinjam" class="form-control" rows="2">{{ old('tgl_pinjam') }}</textarea>
                            <textarea name="tgl_kembali" class="form-control" rows="2">{{ old('tgl_kembali') }}</textarea>
                        </div>

                        <!-- Karyawan dan Asal Instansi dalam satu baris -->
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Karyawan yg Ditemui</label>
                                    <select name="employee_id" class="form-control">
                                        <option value="">-- Pilih Karyawan --</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                                {{ $employee->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Asal Instansi</label>
                                    <input type="text" name="asal_instansi" class="form-control" value="{{ old('asal_instansi') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Keperluan</label>
                            <textarea name="keperluan" class="form-control" rows="2">{{ old('keperluan') }}</textarea>
                        </div> --}}

                        <!-- Button Full Width - PAKAI CSS LANGSUNG -->
                        <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">
                            <i class="fas fa-save me-2"></i> Pinjam
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection