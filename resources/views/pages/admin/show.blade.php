@extends('layouts.app')

@section('title', 'Detail Admin page')

@section('content')
<div class="container py 4">
    <h1>Detail Admin</h1>
     
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>{{ $user->name }}</th>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{ $user->email }}</th>
        </tr>
        <tr>
            <th>Password</th>
            <th>{{ $user->password }}</th>
        </tr>
        <tr>
            <th>Password Confirmation</th>
            <th>{{ $user->password_confirmation }}</th>
        </tr>
    </table>

    <a href="{{ route('admin.admin.index', $user->id) }}" class="btn btn mb-3" style="background-color : #FFFDD0">Kembali</a>
</div>
@endsection