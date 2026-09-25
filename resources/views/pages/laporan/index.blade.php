@extends('layouts.app')

@section('title', 'Laporan Peminjaman page')

@section('content')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container-fluid py-3">
        <h1>Halaman Laporan Peminjaman</h1>

        @php
            $months = $bulan ?? ['JUL', 'AGS', 'SEPT', 'OKT', 'NOV', 'DES', 'JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN'];
            $values = $pengunjung ?? [710, 986, 878, 1132, 957, 152, 792, 161, 93, 89, 0, 0];
            
           
            $maxValue = max($values) > 0 ? max($values) : 1; 
        @endphp

       
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="m-0 font-weight-bold">Grafik Laporan Peminjaman</h5>
            </div>
            <div class="card-body">
                @foreach($laporan as $item)
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fw-bold text-uppercase">{{ $item->bulan }}</span>
                        <span class="fw-bold">{{ number_format($item->total) }} Peminjaman</span>
                    </div>
                    <div class="progress" style="height: 12px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="background-color: #000000; width: {{ min(($item->total / 1000) * 100, 100) }}%;">
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
            </div>
        </div>
        <a href="{{ route('admin.dashboard')}}" class="btn mb-3" style="background-color: #FFFDD0; border: 1px solid #ccc;">Kembali</a>
@endsection