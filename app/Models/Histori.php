<?php

namespace App\Models;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    protected $table = 'histori';
    protected $fillable = ['id', 'gedung', 'kendaraan_id', 'jam_masuk', 'jam_keluar', 'status', 'created_At', 'updated_at'];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id', 'id');
    }
}
