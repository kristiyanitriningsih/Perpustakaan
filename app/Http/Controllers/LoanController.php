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

    public function store(Request $request)
    {
         // 1. Validasi Input Data
        $validated = $request->validate([
            'no_telp'          => 'required|string|max:20',
            'kode_buku'        => 'required|exists:books,kode_buku',
            'tgl_pinjam'       => 'nullable|date',
            'tgl_kembali'      => 'required|date|after_or_equal:tgl_pinjam',
            'jumlah'           => 'required|integer',
        ]);

        $validated['status'] = 'dipinjam';

        // 2. Simpan Data ke Database
        Loan::create($validated);

        // 3. Kembali ke Halaman dengan Pesan Sukses
        return redirect()->route('admin.loan.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
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
