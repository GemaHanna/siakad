<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongans = Golongan::withCount('mahasiswas')->paginate(10);
        return view('golongan.index', compact('golongans'));
    }

    public function create()
    {
        return view('golongan.create');
        
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nama_Gol' => 'required|max:255'
        ]);

        Golongan::create($validated);
        
        return redirect()->route('golongan.index')
            ->with('success', 'Golongan berhasil ditambahkan');
            
    }

    public function show($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.show', compact('golongan'));
    }

    public function edit($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.edit', compact('golongan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // 'name_Gol' => 'required|max:255|unique:golongans,name_Gol,'.$id
        ]);

        $golongan = Golongan::findOrFail($id);
        $golongan->update($validated);
        
        return redirect()->route('golongan.index')
            ->with('success', 'Golongan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Golongan::destroy($id);
        return redirect()->route('golongan.index')
            ->with('success', 'Golongan berhasil dihapus');
    }
}