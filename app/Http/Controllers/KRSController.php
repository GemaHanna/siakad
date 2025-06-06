<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    public function index()
    {
        $krsList = KRS::with(['mahasiswa', 'matakuliah'])->paginate(10);
        return view('krs.index', compact('krsList'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('krs.create', compact('mahasiswas', 'matakuliahs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'NIM' => 'required|exists:mahasiswas,NIM',
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
        ]);

        // Cek duplikasi
        if (KRS::where('NIM', $request->NIM)->where('Kode_mk', $request->Kode_mk)->exists()) {
            return back()->with('error', 'Matakuliah sudah ada di KRS ini');
        }

        KRS::create($validated);
        
        return redirect()->route('krs.index')
            ->with('success', 'KRS berhasil ditambahkan');
    }

    public function show($id)
    {
        $krs = KRS::with(['mahasiswa', 'matakuliah'])->findOrFail($id);
        return view('krs.show', compact('krs'));
    }

    public function edit($id)
    {
        $krs = KRS::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = MataKuliah::all();
        return view('krs.edit', compact('krs', 'mahasiswas', 'matakuliahs'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'NIM' => 'required|exists:mahasiswas,NIM',
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
        ]);

        $krs = KRS::findOrFail($id);
        $krs->update($validated);
        
        return redirect()->route('krs.index')
            ->with('success', 'KRS berhasil diperbarui');
    }

    public function destroy($id)
    {
        $krs = KRS::findOrFail($id);
        $krs->delete();
        
        return redirect()->route('krs.index')
            ->with('success', 'KRS berhasil dihapus');
    }
}