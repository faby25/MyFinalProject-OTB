<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Multa;

class Tmulta extends Model
{
    use HasFactory;



    public function multas(){
        return $this->hasMany(Multa::class);
    }
}
