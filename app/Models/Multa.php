<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
/**
 * Class Multa
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Multa extends Model
{

    // static $rules = [
    // ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    // protected $fillable = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tmulta(){
        return $this->belongsTo(User::class);
    }


}
