<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dokters() {
        return $this->hasMany(Dokter::class);
    }

    public function pasiens() {
        return $this->hasMany(Pasien::class);
    }
}
