@extends('layouts.app')
@section('content')
 <h1>Daftar Pengguna</h1>
 <table>
 <thead>
 <tr>
 <th>ID</th>
 <th>Nama</th>
 <th>NPM</th>
 <th>Kelas</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($users as $user)
 <tr>
10
 <td>{{ $user->id }}</td>
 <td>{{ $user->nama }}</td>
 <td>{{ $user->nim }}</td>
 <td>{{ $user->nama_kelas }}</td>
 </tr>
 @endforeach
 </tbody>
 </table>
@endsection