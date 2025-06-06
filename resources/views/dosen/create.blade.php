@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Tambah Dosen Baru</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('dosen.index') }}">Kembali</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
    <strong>NIP:</strong>
    <input type="text" 
           name="NIP" 
           class="form-control @error('NIP') is-invalid @enderror" 
           placeholder="NIP"
           oninput="this.value = this.value.replace(/[^0-9]/g, '')"
           minlength="10"
           maxlength="30"
           required>
    @error('NIP')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="Nama" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Alamat"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>No HP:</strong>
                    <input type="number" name="Nohp" class="form-control" 
       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
       minlength="10" maxlength="15" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </div>
    </form>
@endsection