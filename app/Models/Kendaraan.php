<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    protected $fillable = ['id', 'nama_civitas', 'status_civitas', 'nip_nim', 'plat_nomor', 'jenis_kendaraan', 'merk', 'foto_stnk', 'status_kendaraan'];



    public function getfotostnk()
    {
        if (!$this->foto_stnk) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->foto_stnk);
    }

    public function histori()
    {
        return $this->hasMany(Kendaraan::class, 'kendaraan_id');
    }
}
