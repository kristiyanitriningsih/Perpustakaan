<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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

    $bukuTerfavorit = Book::withCount('loan')
        ->orderBy('loan_count','desc')
        ->take(5)
        ->get();

    return view('home', compact('labels', 'totals', 'bukuTerfavorit'));
    }
}
