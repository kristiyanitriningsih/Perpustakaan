<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = Book::all();
        return view('pages.book.index', compact('book'));
    }

    public function create()
    {
        return view('pages.book.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required|string|unique:books,kode_buku',
            'stok' => 'required|integer|min:0',
        ]);

        Book::create([
            'kode_buku' => $request->kode_buku,
            'stok' => $request->stok,
        ]);

        return redirect()->route('admin.book.index')->with('success', 'Data pegawai berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('pages.book.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('pages.book.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_buku' => 'required|string|unique:books,kode_buku',
            'stok' => 'required|integer|min:0',
        ]);

        $book = Book::findOrFail($id);

        $book->update([
            'kode_buku' => $request->kode_buku,
            'stok' => $request->stok,
        ]);

        return redirect()->route('admin.book.index')->with('success', 'Data buku berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.book.index')->with('success', 'Data buku berhasil dihapus');
    }
}
