<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
