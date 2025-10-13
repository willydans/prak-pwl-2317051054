@extends('layouts.app')

@section('content')

<div class="container" style="font-family: sans-serif; margin: 2rem auto; max-width: 800px;">
<h1>Daftar User</h1>

{{-- Notifikasi Sukses --}}
@if (session('success'))

<div style="padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
{{ session('success') }}
</div>
@endif

<a href="{{ route('user.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
+ Tambah User Baru
</a>

<table style="width: 100%; border-collapse: collapse;">
<thead style="background-color: #f2f2f2;">
<tr>
<th style="padding: 12px; border: 1px solid #ddd; text-align: left;">ID</th>
<th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Nama</th>
<th style="padding: 12px; border: 1px solid #ddd; text-align: left;">NIM</th>
<th style="padding: 12px; border: 1px solid #ddd; text-align: center;">Aksi</th>
</tr>
</thead>
<tbody>
@forelse ($users as $user)
<tr>
<td style="padding: 12px; border: 1px solid #ddd;">{{ $user->id }}</td>
<td style="padding: 12px; border: 1px solid #ddd;">{{ $user->nama }}</td>
<td style="padding: 12px; border: 1px solid #ddd;">{{ $user->nim }}</td>
<td style="padding: 12px; border: 1px solid #ddd; text-align: center;">
<!-- Tombol Edit -->
<a href="{{ route('user.edit', $user->id) }}" style="padding: 5px 10px; background-color: #ffc107; color: #212529; text-decoration: none; border-radius: 3px; margin-right: 5px;">Edit</a>

            <!-- Form untuk Tombol Hapus -->
            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')" style="padding: 5px 10px; background-color: #dc3545; color: white; border: none; border-radius: 3px; cursor: pointer;">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4" style="padding: 12px; border: 1px solid #ddd; text-align: center;">Belum ada data user.</td>
    </tr>
    @endforelse
</tbody>

</table>

</div>
@endsection