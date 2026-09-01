@extends('layouts.app')

@section('title', 'Edit - Data Buku page')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Buku</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Data Buku</h4>
                </div>
                <div class="card-body">
                    
                    {{-- Menampilkan Pesan Error Validasi Jika Ada --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.book.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')

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

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.book.index') }}" class="btn btn" style="background-color : #FFFDD0">Kembali</a>
                            <button type="submit" class="btn btn" style="background-color : #FFFDD0">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection