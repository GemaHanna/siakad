<?php

namespace App\Http\Controllers;

use App\Models\JadwalAkademik;
use App\Models\Matakuliah;
use App\Models\Ruang;
use App\Models\Golongan;
use Illuminate\Http\Request;

class JadwalAkademikController extends Controller
{
    public function index()
    {
        $jadwals = JadwalAkademik::with(['matakuliah', 'ruang', 'golongan'])->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $matakuliahs = Matakuliah::all();
        $ruangs = Ruang::all();
        $golongans = Golongan::all();
        return view('jadwal.create', compact('matakuliahs', 'ruangs', 'golongans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
            'id_ruang' => 'required|exists:ruangs,id',
            'id_Gol' => 'required|exists:golongans,id',
        ]);

        JadwalAkademik::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(JadwalAkademik $jadwal)
    {
        $matakuliahs = Matakuliah::all();
        $ruangs = Ruang::all();
        $golongans = Golongan::all();
        return view('jadwal.edit', compact('jadwal', 'matakuliahs', 'ruangs', 'golongans'));
    }

    public function update(Request $request, JadwalAkademik $jadwal)
    {
        $request->validate([
            'hari' => 'required',
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
            'id_ruang' => 'required|exists:ruangs,id',
            'id_Gol' => 'required|exists:golongans,id',
        ]);

        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy(JadwalAkademik $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus');
    }
}
