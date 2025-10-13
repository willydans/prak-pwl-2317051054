@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Mata Kuliah</h1> [cite: 210]

    <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST"> [cite: 211]
        @csrf
        @method('PUT') [cite: 213]

        <label for="nama_mk">Nama Mata Kuliah:</label><br>
        <input type="text" id="nama_mk" name="nama_mk" value="{{ $mk->nama_mk }}" required><br><br> [cite: 217]

        <label for="sks">SKS:</label><br>
        <input type="number" id="sks" name="sks" value="{{ $mk->sks }}" required><br><br> [cite: 222]

        <button type="submit">Update</button> [cite: 226]
    </form>
</div>
@endsection