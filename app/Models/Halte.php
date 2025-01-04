<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halte extends Model
{
    use HasFactory;

    protected $table = 'halte';

    protected $guarded = ['id'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_halte', 'id');
    }
}
