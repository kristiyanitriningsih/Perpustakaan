@extends('layouts.app')

@section('title', 'Login Page - Library')

@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            
            <div class="col-lg-5 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-4">Halaman Login</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        @csrf

                                        <div class="mb-2 form-group">
                                            <label for="email" class="col-md-4 col-form-label ms-2">{{ __('Email :') }}</label>
                                            <input type="email" name="email" id="email" class="form-control rounded-pill py-2 px-3 form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter Email...">

                                            @error('email')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-md-4 col-form-label ms-2">{{ __('Password :') }}</label>
                                            <input type="password" name="password" id="password" class="form-control rounded-pill py-2 px-3 form-control-user @error('password') is-invalid @enderror" placeholder="Enter Your Password...">

                                            @error('password')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div><br>
                                        <button type="submit" class="btn rounded-pill w-100 py-2 btn-user btn-block" style="background-color : #FFFDD0">
                                            <span class="fa fa-sign-in-alt"></span>Login Masuk
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        <div>
            
</div>