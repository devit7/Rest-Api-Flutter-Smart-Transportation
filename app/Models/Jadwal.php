<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $guarded = ['id'];

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id');
    }

    public function halte()
    {
        return $this->belongsTo(Halte::class, 'id_halte', 'id');
    }
}
