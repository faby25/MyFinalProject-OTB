<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Notice;
use App\Models\Lectura;

class Meter extends Model
{
    // protected $with=['user','lecturas'];
    // protected $fillable = ['user_id','nombre','direccion'];



    public function user(){
      return $this->belongsTo(User::class);
    }
    public function lecturas(){
      return $this->hasMany(Lectura::class);
    }
    // public function notices(){
    //   return $this->hasMany(Notice::class);
    // }
}
