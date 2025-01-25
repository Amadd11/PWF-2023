<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = ['id_penulis', 'judul', 'published_date'];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'id_buku');
    }
}
