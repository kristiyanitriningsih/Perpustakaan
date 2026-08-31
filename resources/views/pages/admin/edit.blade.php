@extends('layouts.app')

@section('title', 'Edit - Admin page')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Admin</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Edit Admin</h4>
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

                    <form action="{{ route('admin.admin.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Input Nama --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}" 
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Password (Opsional) --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Konfirmasi Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">\Passwor Confirmationd</label>
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation" 
                                   name="password_confirmation">
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.admin.index') }}" class="btn btn" style="background-color : #FFFDD0">Kembali</a>
                            <button type="submit" class="btn btn" style="background-color : #FFFDD0">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection