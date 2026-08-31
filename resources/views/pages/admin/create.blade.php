@extends('layouts.app')

@section('title', 'Create New - Admin page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New - Admin page</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="{{ route('admin.admin.store') }}" method="POST">
                    @csrf

                    <div class="card-header">
                        <h5 class="card-title">Tambah Admin Baru</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        
                        @error('name')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        
                        @error('password')
                            <div class="invalid-feedback d-block">
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                        
                        @error('password_confirmation')
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

                        <a href="{{ route('admin.admin.index') }}" class="btn btn" style="background-color : #FFFDD0">
                            <span cllass="fa fa-cancel"></span>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection