@extends('layouts.app')

@section('title', 'Create New - Data Buku page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New - Data Buku</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="{{ route('admin.book.store') }}" method="POST">
                    @csrf

                    <div class="card-header">
                        <h5 class="card-title">Tambah Buku Baru</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="kode_buku" class="form-label">Kode Buku</label>
                            <input type="string" name="kode_buku" id="kode_buku" value="{{ old('kode_buku') }}" class="form-control @error('kode_buku') is-invalid @enderror">
                        
                        @error('kode_buku')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="integer" name="stok" id="stok" value="{{ old('stok') }}" class="form-control @error('stok') is-invalid @enderror">
                        
                        @error('stok')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn" style="background-color : #FFFDD0">
                            <span cllass="fa fa-save"></span>
                            Simpan
                        </button>

                        <a href="{{ route('admin.book.index') }}" class="btn btn" style="background-color : #FFFDD0">
                            <span cllass="fa fa-cancel"></span>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection