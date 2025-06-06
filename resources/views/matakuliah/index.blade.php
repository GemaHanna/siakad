@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h1 class="h3 mb-0">Data Mata Kuliah</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Matakuliah
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Matakuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Dosen Pengampu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($matakuliahs as $mk)
                        <tr>
                            <td>{{ $mk->Kode_mk }}</td>
                            <td>{{ $mk->Nama_mk }}</td>
                            <td>{{ $mk->sks }}</td>
                            <td>{{ $mk->semester }}</td>
                            <td>
                                @if($mk->pengampus->count() > 0)
                                    <ul class="list-unstyled mb-0">
                                        @foreach($mk->pengampus as $pengampu)
                                            <li>{{ $pengampu->dosen->Nama ?? '-' }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">Belum ada pengampu</span>
                                @endif
                            </td>
                            <td>
                            <div class="d-flex gap-2">
    <a href="{{ route('matakuliah.edit', $mk->Kode_mk) }}" 
       class="btn btn-sm btn-warning" title="Edit">
        <i class="fas fa-edit me-1"></i> Edit
    </a>

    <form action="{{ route('matakuliah.destroy', $mk->Kode_mk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
            <i class="fas fa-trash me-1"></i> Hapus
        </button>
    </form>
</div>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data matakuliah</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($matakuliahs->hasPages())
            <div class="mt-3">
                {{ $matakuliahs->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table th {
        white-space: nowrap;
    }
    .table td {
        vertical-align: middle;
    }
</style>
@endpush