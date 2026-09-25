<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loan = Loan::with('book')->get();
        return view('pages.loan.index', compact('loan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_telp'     => 'required|string|max:20',
            'kode_buku'   => 'required|exists:books,kode_buku',
            'tgl_pinjam'  => 'nullable|date',
            'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
            'jumlah'      => 'required|integer|min:1',
        ], [
            'no_telp.required'          => 'Nomor telephone wajib diisi.',
            'kode_buku.required'        => 'Kode buku wajib diisi.',
            'kode_buku.exists'          => 'Kode buku tidak ditemukan atau tidak valid.',
            'tgl_kembali.required'      => 'Tanggal kembali wajib diisi.',
            'tgl_kembali.after_or_equal'=> 'Tanggal kembali tidak boleh sebelum tanggal pinjam.',
            'jumlah.required'           => 'Jumlah pinjam wajib diisi.',
            'jumlah.min'                => 'Jumlah pinjam minimal 1 buku.',
        ]);

        $book = Book::where('kode_buku', $validated['kode_buku'])->first();

        if (!$book) {
            return redirect()->back()->with('error', 'Kode buku tidak ditemukan!');
        }

        if ($book->stok < $validated['jumlah']) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi! Stok tersisa: ' . $book->stok);
        }

        $validated['buku_id'] = $book->id;
        $validated['status']  = 'dipinjam';

        unset($validated['kode_buku']);

        Loan::create($validated);

        $book->decrement('stok', $validated['jumlah']);

        return redirect()->back()->with('success', 'Data peminjaman berhasil ditambahkan!');
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

        return redirect()->route('admin.loan.index')->with('success', 'Data peminjaman berhasil dihapus');
    }
}