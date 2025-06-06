@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Daftar Dosen</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('dosen.create') }}">Tambah Dosen Baru</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($dosens as $dosen)
        <tr>
            <td>{{ $dosen->NIP }}</td>
            <td>{{ $dosen->Nama }}</td>
            <td>{{ $dosen->Alamat }}</td>
            <td>{{ $dosen->NoHP }}</td>
            <td>
                <form action="{{ route('dosen.destroy',$dosen->NIP) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('dosen.show',$dosen->NIP) }}">Detail</a>
                    <a class="btn btn-primary" href="{{ route('dosen.edit',$dosen->NIP) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection