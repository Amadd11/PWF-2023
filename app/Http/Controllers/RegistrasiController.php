<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use App\Models\Agama;
use App\Models\Buku;
use Illuminate\Http\Request;
use PDF;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data registrasi, agama, dan buku
        $registrasi = Registrasi::with(['agama', 'buku'])->get();

        // Menampilkan daftar registrasi
        return view('registrasi.index', compact('registrasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agama = Agama::all();  // Ambil semua data agama
        $buku = Buku::all();    // Ambil semua data buku

        return view('registrasi.create', compact('agama', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'agama' => 'required|integer',
            'buku' => 'required|integer',
            'alamat' => 'required|string',
        ]);

        Registrasi::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'id_agama' => $request->agama,
            'id_buku' => $request->buku,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('registrasi.index')->with('pesan', 'Pendaftaran berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        return view('registrasi.show', compact('registrasi'));
    }


    /**
     * Print the registration card.
     */
    public function cetak($id)
    {
        // Ambil data registrasi berdasarkan ID
        $registrasi = Registrasi::findOrFail($id);

        // Generate PDF menggunakan library PDF
        $pdf = PDF::loadView('registrasi.cetak', ['registrasi' => $registrasi]);

        // Download file PDF
        return $pdf->download('karturegistrasi.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $registrasi = Registrasi::findOrFail($id);
        $agama = Agama::all();
        $buku = Buku::all();
        return view('registrasi.edit', compact('registrasi', 'agama', 'buku'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'agama' => 'required|integer',
            'buku' => 'required|integer',
            'alamat' => 'required|string',
        ]);

        $registrasi = Registrasi::findOrFail($id);
        $registrasi->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'id_agama' => $request->agama,
            'id_buku' => $request->buku,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('registrasi.index')->with('pesan', 'Pendaftaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus data registrasi
        $registrasi = Registrasi::findOrFail($id);
        $registrasi->delete();

        return redirect()->route('registrasi.index')->with('pesan', 'Pendaftaran berhasil dihapus');
    }
}
