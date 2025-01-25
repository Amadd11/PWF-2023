<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\registrasi;
use PDF;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agama = Agama::get();

        return view('registrasi.index', compact('agama'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|numeric',
            'agama' => 'required|integer',
            'alamat' => 'required|string',
        ]);

        $registrasi = new Registrasi();
        $registrasi->nama = $request->nama;
        $registrasi->email = $request->email;
        $registrasi->tanggal_lahir = $request->tanggal_lahir;
        $registrasi->no_hp = $request->no_hp;
        $registrasi->id_agama = $request->agama;
        $registrasi->alamat = $request->alamat;
        $registrasi->save();
        $id_pendaftaran = $registrasi->id;

        return redirect('/registrasi/cetak/' . $id_pendaftaran)->with('pesan', 'Pendaftaran berhasil');
    }

    public function cetak($id)
    {
        $registrasi = Registrasi::find($id);
        // return view('registrasi.cetak', compact('registrasi'));
        $pdf = PDF::loadView('registrasi.cetak', ['registrasi' => $registrasi]);
        return $pdf->download('karturegistrasi.pdf');
    }
}
