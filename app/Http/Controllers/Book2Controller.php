<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class Book2Controller extends Controller
{
    public function index()
    {
        $book = Book::all();
        return view('pages.book2.index', compact('book'));
    }

    // public function show(string $id)
    // {
    //     $book = Book::findOrFail($id);
    //     return view('pages.book2.show', compact('book'));
    // }
}
