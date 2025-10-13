@extends('layouts.app')

@section('content')

<div class="container" style="font-family: sans-serif; margin: 2rem auto; max-width: 800px;">
<h1>Edit User</h1>

{{-- Menampilkan Error Validasi --}}
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

<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 1rem;">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 1rem;">
        <label for="npm">NPM:</label><br>
        <input type="text" id="npm" name="npm" value="{{ old('npm', $user->nim) }}" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    </div>

    <div style="margin-bottom: 1.5rem;">
        <label for="kelas_id">Kelas:</label><br>
        <select name="kelas_id" id="kelas_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">-- Pilih Kelas --</option>
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" {{ old('kelas_id', $user->kelas_id) == $kelasItem->id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Update Data</button>
</form>

</div>

@endsection