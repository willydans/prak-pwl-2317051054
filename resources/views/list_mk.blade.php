@extends('layouts.app')

@section('content')

<div class="container">
<h1>Daftar Mata Kuliah</h1>

{{-- Menampilkan pesan sukses setelah operasi update atau delete --}}
@if (session('success'))
    <div style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

{{-- Link ini mengarah ke halaman form tambah data --}}
<a href="{{ route('matakuliah.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    Tambah Mata Kuliah Baru
</a>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
    <thead style="background-color: #f2f2f2;">
        <tr>
            <th style="text-align: left; padding: 12px;">ID</th>
            <th style="text-align: left; padding: 12px;">Nama Mata Kuliah</th>
            <th style="text-align: left; padding: 12px;">SKS</th>
            <th style="text-align: left; padding: 12px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        {{-- Melakukan perulangan untuk setiap data mata kuliah yang dikirim dari controller --}}
        @foreach ($mks as $mk)
        <tr>
            <td style="padding: 12px;">{{ $mk->id }}</td>
            <td style="padding: 12px;">{{ $mk->nama_mk }}</td>
            <td style="padding: 12px;">{{ $mk->sks }}</td>
            <td style="padding: 12px;">
                {{-- Tombol Edit mengarah ke route 'matakuliah.edit' dengan membawa ID --}}
                <a href="{{ route('matakuliah.edit', $mk->id) }}" style="text-decoration: none; color: #ffc107; font-weight: bold;">Edit</a> |

                {{-- Form untuk Tombol Hapus --}}
                <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="background: none; border: none; color: #dc3545; cursor: pointer; padding: 0; font-weight: bold;">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
