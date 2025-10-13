<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Mengimpor model MataKuliah agar bisa digunakan di controller ini
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Method untuk menampilkan semua data mata kuliah.
     * Mengambil semua data dari model Matakuliah dan menampilkannya
     * ke view 'list_mk'.
     */
    public function index()
    {
        $data = [
            'title' => 'List Mata Kuliah',
            'mks' => Matakuliah::all(), // Mengambil semua data dari tabel mata_kuliah
        ];

        return view('list_mk', $data);
    }

    /**
     * Method untuk menampilkan form tambah data mata kuliah.
     * Hanya mengarahkan ke view 'create_mk'.
     */
    public function create()
    {
        return view('create_mk', ['title' => 'Create Mata Kuliah']);
    }

    /**
     * Method untuk menyimpan data baru dari form ke database.
     * Menerima data dari request, lalu menyimpannya menggunakan model Matakuliah.
     * Setelah berhasil, pengguna akan diarahkan kembali ke halaman daftar mata kuliah.
     */
    public function store(Request $request)
    {
        // Membuat record baru di tabel mata_kuliah
        Matakuliah::create([
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);

        // Mengarahkan kembali ke halaman /mata-kuliah
        return redirect()->to('/matakuliah');
    }

    /**
     * Menampilkan form untuk mengedit data mata kuliah berdasarkan ID.
     * Mengambil data lama dan menampilkannya ke dalam form edit.
     */
    public function edit($id)
    {
        $mk = Matakuliah::findOrFail($id); // Mencari data berdasarkan ID, jika tidak ditemukan akan menampilkan error 404
        return view('edit_mk', ['title' => 'Edit Mata Kuliah', 'mk' => $mk]); // Mengirim data yang ditemukan ke view 'edit_mk'
    }

    /**
     * Memperbarui data mata kuliah di database.
     * Menerima data baru dari form, melakukan validasi, dan menyimpannya.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama_mk' => 'required',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        $mk = Matakuliah::findOrFail($id); // Mencari data yang akan diupdate

        $mk->update([
            'nama_mk' => $request->input('nama_mk'),
            'sks' => $request->input('sks'),
        ]);

        // Mengarahkan kembali ke halaman /mata-kuliah dengan pesan sukses
        return redirect()->to('/matakuliah')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus data mata kuliah dari database berdasarkan ID.
     */
    public function destroy($id)
    {
        $mk = Matakuliah::findOrFail($id); // Mencari data yang akan dihapus
        $mk->delete(); // Menghapus data dari database

        // Mengarahkan kembali ke halaman /mata-kuliah dengan pesan sukses
        return redirect()->to('/matakuliah')->with('success', 'Data berhasil dihapus!');
    }
}

