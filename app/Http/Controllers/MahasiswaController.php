<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Golongan;
use App\Models\Matakuliah;
use App\Models\PresensiAkademik;

class MahasiswaController extends Controller
{
    public function index()
    {
        // $mahasiswa = Mahasiswa::all();
        $mahasiswa = Mahasiswa::with('golongan')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
{
    $golongans = Golongan::all(); // ambil semua data golongan
    return view('mahasiswa.create', compact('golongans'));
}

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'NIM' => 'required|unique:mahasiswas',
            'Nama' => 'required',
            'Alamat' => 'required',
            'Nohp' => 'required|regex:/^[0-9]+$/|min:10|max:15',
            'Semester' => 'required|integer',
            'id_Gol' => 'required|exists:golongans,id',
        ]);
        // dd($validated);

        Mahasiswa::create($validated);
    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa ditambahkan');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
    return view('mahasiswa.show', compact('mahasiswa'));
    }

    // $mahasiswa = Mahasiswa::findOrFail($id);
    // return view('mahasiswa.edit', compact('mahasiswa'));

    public function edit($id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);
    $golongans = Golongan::all();
    return view('mahasiswa.edit', compact('mahasiswa', 'golongans'));
}

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
    $mahasiswa->update($request->all());
    return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa diupdate');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        // return response()->json(['message' => 'Data mahasiswa dihapus']);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
