<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pelajaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
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
    
}
