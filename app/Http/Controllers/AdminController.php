<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('pages.admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.admin.index')->with('success', 'Create new admin is successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' .$id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // 1. CARI DATA USER BERDASARKAN ID (Baris ini yang tadi hilang)
        $user = User::findOrFail($id);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        // Jika form password diisi, enkripsi dan update password baru
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        // 2. Sekarang $user sudah ada dan bisa di-update
        $user->update($data);

        return redirect()->route('admin.admin.index')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.admin.index')->with('success', 'Admin berhasil dihapus');
    }
}
