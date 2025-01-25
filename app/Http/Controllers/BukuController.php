<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::with('penulis')->get();
        $count = $data->count();

        return view('buku.index', compact('data', 'count'));
    }

    public function create()
    {
        $penulis = Penulis::all();

        return view('buku.create', compact('penulis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'id_penulis' => 'required|exists:penulis,id',
            'published_date' => 'nullable|date',
        ]);

        Buku::create($validated);

        return redirect('/buku')->with('pesan', 'Buku berhasil disimpan');
    }

    public function show($id)
    {
        $buku = Buku::with('penulis')->findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $penulis = Penulis::all();

        return view('buku.edit', compact('buku', 'penulis'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'id_penulis' => 'required|exists:penulis,id',
            'published_date' => 'nullable|date',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($validated);

        return redirect('/buku')->with('pesan', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect('/buku')->with('pesan', 'Buku berhasil dihapus');
    }
}
