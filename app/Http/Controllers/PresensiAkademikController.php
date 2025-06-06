<?php

namespace App\Http\Controllers;

use App\Models\PresensiAkademik;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Pengampu;
use Illuminate\Http\Request;

class PresensiAkademikController extends Controller
{
    public function index()
    {
        $data = PresensiAkademik::with(['mahasiswa', 'matakuliah', 'dosen'])->get();
        return view('presensi.index', compact('data'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        $pengampus = Pengampu::with('dosen')->get();

        return view('presensi.create', compact('mahasiswas', 'matakuliahs', 'pengampus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswas,NIM',
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
        ]);

        PresensiAkademik::create($request->all());
        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $presensi = PresensiAkademik::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $matakuliahs = Matakuliah::all();
        $pengampus = Pengampu::with('dosen')->get();

        return view('presensi.edit', compact('presensi', 'mahasiswas', 'matakuliahs', 'pengampus'));
    }

    public function update(Request $request, $id)
    {
        $presensi = PresensiAkademik::findOrFail($id);

        $request->validate([
            'hari' => 'required',
            'tanggal' => 'required|date',
            'status_kehadiran' => 'required',
            'NIM' => 'required|exists:mahasiswas,NIM',
            'Kode_mk' => 'required|exists:matakuliahs,Kode_mk',
        ]);

        $presensi->update($request->all());
        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        PresensiAkademik::destroy($id);
        return redirect()->route('presensi.index')->with('success', 'Data presensi berhasil dihapus!');
    }
}
