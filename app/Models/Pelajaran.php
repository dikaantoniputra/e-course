<?php

namespace App\Models;

use App\Models\User;
use App\Models\Materi;
use App\Models\Transaksi;
use App\Models\Pendidikan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelajaran extends Model
{
    use HasFactory;


    protected $guarded = [];


    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }

    public function materi()
    {
        return $this->hasMany(Materi::class);
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    
}
