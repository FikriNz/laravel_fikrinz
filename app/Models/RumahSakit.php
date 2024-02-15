<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RumahSakit extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function dataPasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
