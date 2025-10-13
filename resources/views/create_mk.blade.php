@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Mata Kuliah Baru</h1>

    {{-- Form ini akan mengirim data ke rute 'matakuliah.store' dengan metode POST --}}
    <form action="{{ route('matakuliah.store') }}" method="POST">
        {{-- @csrf adalah token keamanan yang wajib ada di setiap form Laravel --}}
        @csrf

        <label for="nama_mk">Nama Mata Kuliah:</label><br>
        <input type="text" id="nama_mk" name="nama_mk" required><br><br>

        <label for="sks">SKS:</label><br>
        <input type="number" id="sks" name="sks" required><br><br>

        <button type="submit">Submit</button>
    </form>
</div>
@endsection
