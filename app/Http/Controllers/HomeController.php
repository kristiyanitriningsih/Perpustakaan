<?php

namespace App\Http\Controllers;

use App\Models\Loan; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    // Ambil data peminjaman per bulan
    $data = Loan::select(
        DB::raw("MONTH(tgl_pinjam) as bulan_num"),
        DB::raw("DATE_FORMAT(tgl_pinjam, '%b') as bulan"),
        DB::raw("COUNT(*) as total")
    )
    ->groupBy('bulan_num', 'bulan')
    ->orderBy('bulan_num', 'ASC')
    ->get();

    $labels = $data->pluck('bulan');
    $totals = $data->pluck('total');

    // Return ke view home (sesuaikan lokasinya, misal 'home' atau 'pages.home')
    return view('home', compact('labels', 'totals'));
    }
}
