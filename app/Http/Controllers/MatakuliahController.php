<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index()
    {
        $matakuliahs = Matakuliah::with('pengampus.dosen')->paginate(10);
        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
{
    $dosens = Dosen::all(); // Ambil data dosen untuk dropdown
    return view('matakuliah.create', compact('dosens'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'Kode_mk' => 'required|unique:matakuliahs|max:20',
        'Nama_mk' => 'required|max:100',
        'sks' => 'required|integer|min:1|max:10',
        'semester' => 'required|integer|min:1|max:8',
        'pengampu' => 'required|array',
        'pengampu.*' => 'exists:dosens,NIP'
    ]);

    // Simpan matakuliah
    $matakuliah = Matakuliah::create($validated);
    
    // Simpan relasi pengampu
    foreach ($request->pengampu as $nip) {
        $matakuliah->pengampus()->create(['NIP' => $nip]);
    }

    return redirect()->route('matakuliah.index')
        ->with('success', 'Mata kuliah beserta pengampu berhasil ditambahkan');
}
    public function show($Kode_mk)
{
    $matakuliah = Matakuliah::with('pengampus.dosen')->findOrFail($Kode_mk);
    return view('matakuliah.show', compact('matakuliah'));
}
    
    public function edit(Matakuliah $matakuliah)
{
    // dd($matakuliah->Kode_mk);
    $matakuliah = Matakuliah::where('Kode_mk', $matakuliah->Kode_mk)->first();
    return view('matakuliah.edit', compact('matakuliah'));
}

public function update(Request $request, Matakuliah $matakuliah)
{
    $matakuliah->update($request->all());
    return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah diupdate');
}

public function destroy(Matakuliah $matakuliah)
{
    // dd($matakuliah);
    $matakuliah->delete();
    return redirect()->route('matakuliah.index')->with('success', 'Data mata kuliah dihapus');
}
}