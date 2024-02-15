<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'id_rumah_sakit');
    }
}
