<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'bus';

    protected $guarded = ['id'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_bus', 'id');
    }
}
