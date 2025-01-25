<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'registrasi';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'email',
        'tanggal_lahir',
        'no_hp',
        'id_agama',
        'id_buku',
        'alamat',
    ];

    // Relasi ke tabel `agama`
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }

    // Relasi ke tabel `buku`
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
