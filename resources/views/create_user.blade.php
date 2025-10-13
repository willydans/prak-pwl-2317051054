@extends('layouts.app')

@section('content')

<div class="container" style="font-family: sans-serif; margin: 2rem auto; max-width: 800px;">
<h1>Buat Pengguna Baru</h1>

{{-- Menampilkan semua error validasi di bagian atas jika ada --}}
@if ($errors->any())
    <div style="padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">
        <strong>Oops! Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('user.store') }}" method="POST">
    @csrf

    <div style="margin-bottom: 1rem;">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        @error('nama')
            <div style="color: red; font-size: 0.875em; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1rem;">
        <label for="npm">NPM:</label><br>
        <input type="text" id="npm" name="npm" value="{{ old('npm') }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        @error('npm')
            <div style="color: red; font-size: 0.875em; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1.5rem;">
        <label for="kelas_id">Kelas:</label><br>
        <select name="kelas_id" id="kelas_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
        @error('kelas_id')
            <div style="color: red; font-size: 0.875em; margin-top: 5px;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
</form>

</div>

@endsection