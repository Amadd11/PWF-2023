<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Registrasi;
use PDF;

class RegistrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data agama dan registrasi
        $agama = Agama::all();
        $registrasi = Registrasi::all(); // Menampilkan semua data registrasi

        return view('registrasi.index', compact('agama', 'registrasi')); // Menggunakan 'index' untuk menampilkan daftar registrasi
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agama = Agama::all(); // Ambil data agama untuk ditampilkan di form

        return view('registrasi.create', compact('agama')); // Menampilkan form pendaftaran
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
            'alamat' => 'required|string',
        ]);

        // Menyimpan data registrasi baru
        $registrasi = new Registrasi();
        $registrasi->nama = $request->nama;
        $registrasi->email = $request->email;
        $registrasi->tanggal_lahir = $request->tanggal_lahir;
        $registrasi->no_hp = $request->no_hp;
        $registrasi->id_agama = $request->agama;
        $registrasi->alamat = $request->alamat;
        $registrasi->save(); // Simpan data registrasi

        $id_pendaftaran = $registrasi->id;

        return redirect('/registrasi/cetak/' . $id_pendaftaran)->with('pesan', 'Pendaftaran berhasil');
    }

    /**
     * Cetak kartu registrasi.
     */
    public function cetak($id)
    {
        $registrasi = Registrasi::findOrFail($id); // Mengambil data registrasi berdasarkan ID

        // Menghasilkan file PDF dari view
        $pdf = PDF::loadView('registrasi.cetak', ['registrasi' => $registrasi]);
        return $pdf->download('karturegistrasi.pdf'); // Mengunduh file PDF
    }
}
