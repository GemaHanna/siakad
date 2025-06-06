<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index()
    {
        $ruangs = Ruang::all();
        return view('ruang.index', compact('ruangs'));
    }

    public function create() 
    {
        return view('ruang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ruang' => 'required|string|max:255',
        ]);
        Ruang::create($request->all());
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil ditambahkan');
    }

    public function edit(Ruang $ruang) {
        return view('ruang.edit', compact('ruang'));
    }

    public function show($id)
    {
        return Ruang::findOrFail($id);
    }

    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'nama_ruang' => 'required|string|max:255',
        ]);
        $ruang->update($request->all());
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil diperbarui');
    }

    public function destroy(Ruang $ruang) {
        $ruang->delete();
        return redirect()->route('ruang.index')->with('success', 'Ruang berhasil dihapus');
    }
}
