<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pelajaran;
use App\Models\FileMateri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fileMateris()
    {
        return $this->hasMany(FileMateri::class);
    }
}
