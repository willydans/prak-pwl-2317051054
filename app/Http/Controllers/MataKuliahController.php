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

        // Mengarahkan kembali ke halaman /matakuliah
        return redirect()->to('/matakuliah');
    }
}
