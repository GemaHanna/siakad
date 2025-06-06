@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar KRS</h2>
    <a href="{{ route('krs.create') }}" class="btn btn-primary mb-3">Tambah KRS</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <!-- <th>Nama Mahasiswa</th> -->
                <th>Kode MK</th>
                <!-- <th>Mata Kuliah</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($krsList as $krs)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $krs->NIM }}</td>
                <!-- <td>{{ $krs->mahasiswa->Nama ?? '-' }}</td> -->
                <td>{{ $krs->Kode_mk }}</td>
                <!-- <td>{{ $krs->matakuliah->Nama_mk ?? '-' }}</td> -->
                <td>
                    <a href="{{ route('krs.edit', $krs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('krs.destroy', $krs->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus KRS ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $krsList->links() }}
</div>
@endsection