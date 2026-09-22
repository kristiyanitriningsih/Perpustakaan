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
    // public function index()
    // {
    //     $loan = Loan::all();
    //     return view('pages.loan.index', compact('loan'));
    // }

    public function store(Request $request)
    {
    // 1. Validasi Input Data
    $validated = $request->validate([
        'no_telp'     => 'required|string|max:20',
        'kode_buku'   => 'required|exists:books,kode_buku',
        'tgl_pinjam'  => 'nullable|date',
        'tgl_kembali' => 'required|date|after_or_equal:tgl_pinjam',
        'jumlah'      => 'required|integer|min:1',
    ]);

    // 2. Cari data buku berdasarkan kode_buku yang diinput
    $book = \App\Models\Book::where('kode_buku', $validated['kode_buku'])->first();

    // Cek apakah buku ditemukan
    if (!$book) {
    return redirect()->back()->with('error', 'Kode buku tidak ditemukan!');
    }

    // Cek stok buku cukup atau tidak
    if ($book->stok < $validated['jumlah']) {
    return redirect()->back()->with('error', 'Stok buku tidak mencukupi! Stok tersisa: ' . $book->stok);
    }

    // Cek stok buku cukup atau tidak
    if ($book->stok < $validated['jumlah']) {
        return redirect()->back()->with('error', 'Stok buku tidak mencukupi!');
    }

    // 3. Masukkan buku_id ke dalam array $validated
    $validated['buku_id'] = $book->id;
    $validated['status']  = 'dipinjam';

    // 4. Hapus kode_buku dari array agar tidak error saat create ke tabel loans
    unset($validated['kode_buku']);

    // 5. Simpan Data ke Database
    Loan::create($validated);

    // 6. Kurangi Stok Buku Otomatis
    $book->decrement('stok', $validated['jumlah']);

    // 7. Kembali ke Halaman dengan Pesan Sukses
    return redirect()->back()->with('success', 'Data peminjaman berhasil ditambahkan!');
    }
    // public function store(Request $request)
    // {
    //      // 1. Validasi Input Data
    //     $validated = $request->validate([
    //         'no_telp'          => 'required|string|max:20',
    //         'kode_buku'        => 'required|exists:books,kode_buku',
    //         'tgl_pinjam'       => 'nullable|date',
    //         'tgl_kembali'      => 'required|date|after_or_equal:tgl_pinjam',
    //         'jumlah'           => 'required|integer',
    //     ]);

    //     $validated['status'] = 'dipinjam';

    //     // 2. Simpan Data ke Database
    //     Loan::create($validated);

    //     // 3. Kembali ke Halaman dengan Pesan Sukses
    //     return redirect()->back()->with('success', 'Data peminjaman berhasil ditambahkan!');
    // }

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
