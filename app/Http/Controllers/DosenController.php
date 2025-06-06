<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
    return view('dosen.index', compact('dosens'));
    }
    public function create()
    {
        $dosens = Dosen::all();
        return view('dosen.create', compact('dosens'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'NIP' => 'required|max:30|unique:dosens,NIP',
        'Nama' => 'required',
        'Alamat' => 'required',
        'Nohp' => 'required|regex:/^[0-9]+$/|min:10|max:15',
    ]);

    Dosen::create($validatedData);

    return redirect()->route('dosen.index')
        ->with('success', 'Dosen berhasil ditambahkan');
}

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
    return view('dosen.show', compact('dosen'));
    }
    
    public function edit($id)
{
    $dosen = Dosen::findOrFail($id);
    return view('dosen.edit', compact('dosen'));
}

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return $dosen;
    }

    public function destroy($id)
{
    Dosen::destroy($id);
    
    return redirect()->route('dosen.index')
        ->with('success', 'Data dosen berhasil dihapus');
}
}
