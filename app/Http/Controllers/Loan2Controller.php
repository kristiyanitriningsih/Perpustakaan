<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class Loan2Controller extends Controller
{
    public function index()
    {
        $loan = Loan::all();
        return view('pages.loan2.index', compact('loan'));
    }
}
