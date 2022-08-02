<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kunjungan(){
        return $this->belongsTo(Kunjungan::class);
    }

    public function dokter(){
        return $this->belongsTo(Dokter::class);
    }

    public function getRouteKeyName()
    {
        return 'no_rm';
    }

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('no_rm', 'like', '%' . $search . '%');
        });
    }
}
