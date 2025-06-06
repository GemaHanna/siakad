<?php

namespace App\Http\Controllers;

use App\Models\Pengampu;
use App\Models\Matakuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class PengampuController extends Controller
{
    public function index()
{
    $pengampus = Pengampu::with(['dosen', 'matakuliah'])->get();
    return view('pengampu.index', compact('pengampus'));
}


    public function create()
{
    $matakuliahs = Matakuliah::all();
    $dosens = Dosen::all();
    return view('pengampu.create', compact('matakuliahs', 'dosens'));
}


    public function store(Request $request)
    {
        $request->validate([
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
            'NIP' => 'required|exists:dosens,NIP',
        ]);
    
        Pengampu::create($request->all());
        return redirect()->route('pengampu.index')->with('success', 'Data pengampu berhasil ditambahkan!');
    }

    public function show($id)
{
    $pengampu = Pengampu::with(['dosen', 'matakuliah'])->findOrFail($id);
    return view('pengampu.show', compact('pengampu'));
}


    public function update(Request $request, $id)
    {
        $pengampu = Pengampu::findOrFail($id);
        $pengampu->update($request->all());
        return $pengampu;
    }

    public function destroy($id)
{
    Pengampu::destroy($id);
    return redirect()->route('pengampu.index')->with('success', 'Data pengampu berhasil dihapus!');
}

}
