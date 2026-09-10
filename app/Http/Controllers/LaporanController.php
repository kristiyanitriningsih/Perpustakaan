<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $bulan = ['JUL', 'AGS', 'SEPT', 'OKT', 'NOV', 'DES', 'JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN'];
        $pengunjung = [710, 986, 878, 1132, 957, 152, 792, 161, 93, 89, 0, 0];

        
        return view('pages.laporan.index', compact('bulan', 'pengunjung'));
    }
}