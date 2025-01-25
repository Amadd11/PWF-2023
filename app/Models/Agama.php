<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'Agama';

    public function member()
    {
        return $this->hasMany(Registrasi::class, 'id_agama');
    }
}
