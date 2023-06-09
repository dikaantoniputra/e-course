<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelase extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class);
    }

}
