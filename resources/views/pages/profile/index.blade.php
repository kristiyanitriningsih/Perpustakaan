@extends('layouts.app')

@section('title', 'Profile page - Library')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4 px-3 pt-3">
        <h1 class="h3 mb-0 text-gray-800">Profile page</h1>
    </div>

    <div class="row px-3">
        <div class="col-md-6">
            <div class="card card-body">
                <h5 class="card-title">User Profile</h5>

                <form action="{{ route('admin.profile.save') }}" method="POST">
    @csrf

    {{-- Input Name --}}
    <div class="form-group mb-3">
        <label for="name">Name</label>
        {{-- Pastikan ada atribut name="name" --}}
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', auth()->user()->name) }}">
    </div>

    {{-- Input Email --}}
    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email) }}">
    </div>

    {{-- Input Password --}}
    <div class="form-group mb-3">
        <label for="password">Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    {{-- Input Password Confirmation --}}
    <div class="form-group mb-3">
        <label for="password_confirmation">Password Confirmation</label>
        {{-- Wajib name="password_confirmation" --}}
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn" style="background-color : #FFFDD0">Save</button>
</form>
            </div>
        </div>
    </div>
    <!-- Alert jika Berhasil (Success) -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Alert jika Ada Error Validasi Input (Gagal) -->
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
        <strong>Gagal Menyimpan!</strong> Silakan periksa kembali form di atas.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@endsection