<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loan = Loan::all();
        return view('pages.loan.index', compact('loan'));
    }

    public function show(string $id)
    {
        $loan = Loan::findOrFail($id);
        return view('pages.loan.show', compact('loan'));
    }

    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();

        return redirect()->route('admin.loan.index')->with('success', 'Tamu berhasil dihapus');
    }
}
