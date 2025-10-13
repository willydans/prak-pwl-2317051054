<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;

class UserController extends Controller
{
    /**
     * Menampilkan daftar semua user.
     */
    public function index()
    {
        return view('list_user', [
            'title' => 'Daftar User',
            'users' => User::all()
        ]);
    }

    /**
     * Menampilkan form untuk membuat user baru.
     */
    public function create()
    {
        return view('create_user', [
            'title' => 'Tambah User Baru',
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Menyimpan user baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|unique:user,nim', // Validasi 'npm' ke kolom 'nim'
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        User::create([
            'nama' => $request->nama,
            'nim' => $request->npm, // Simpan 'npm' ke kolom 'nim'
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit user.
     * Ini adalah bagian yang diperbaiki.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // 1. Cari user berdasarkan ID
        $kelas = Kelas::all();       // 2. Ambil semua data kelas untuk dropdown

        // 3. Kirim kedua variabel ke view
        return view('edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas
        ]);
    }

    /**
     * Memperbarui data user di database.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|unique:user,nim,' . $user->id, // Abaikan nim user saat ini
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $user->update([
            'nama' => $request->nama,
            'nim' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    /**
     * Menghapus user dari database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}

