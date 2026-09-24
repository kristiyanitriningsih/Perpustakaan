<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Loan::select(
        DB::raw("DATE_FORMAT(tgl_pinjam, '%b') as bulan"),
        DB::raw("MONTH(tgl_pinjam) as bulan_num"),
        DB::raw("COUNT(*) as total")
    )
    ->groupBy('bulan_num', 'bulan')
    ->orderBy('bulan_num', 'ASC')
    ->get();

    return view('pages.laporan.index', compact('laporan'));

    }
}