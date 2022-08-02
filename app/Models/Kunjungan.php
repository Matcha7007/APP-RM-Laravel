<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }
    public function pelayanan(){
        return $this->belongsTo(Pelayanan::class);
    }
    public function poli(){
        return $this->belongsTo(Poli::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function rekam_medis(){
        return $this->hasMany(RekamMedis::class);
    }
}
