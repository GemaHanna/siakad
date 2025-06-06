@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Data Pengampu</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pengampu.create') }}" class="btn btn-primary mb-3">Tambah Pengampu</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Kode MK</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>No HP Dosen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengampus as $i => $pengampu)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $pengampu->matakuliah->Kode_mk }}</td>
                            <td>{{ $pengampu->matakuliah->Nama_mk }}</td>
                            <td>{{ $pengampu->matakuliah->sks }}</td>
                            <td>{{ $pengampu->dosen->Nama }}</td>
                            <td>{{ $pengampu->dosen->NoHP }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('pengampu.edit', $pengampu->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <form action="{{ route('pengampu.destroy', $pengampu->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($pengampus->isEmpty())
                <p class="text-center text-muted">Belum ada data pengampu.</p>
            @endif
        </div>
    </div>
</div>
@endsection
