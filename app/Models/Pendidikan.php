<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function tentor()
    {
        return $this->hasMany(Tentor::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelase::class);
    }
}
