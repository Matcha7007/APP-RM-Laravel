<?php

namespace App\Models;

use App\Models\Poli;
use App\Models\Gender;
use App\Models\RekamMedis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Dokter extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function poli() {
        return $this->belongsTo(Poli::class);
    }


    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function rekam_medis() {
        return $this->hasMany(RekamMedis::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
