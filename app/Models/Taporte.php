<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taporte
 *
 * @property $id
 * @property $descripcion
 * @property $monto
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Taporte extends Model
{
    
    static $rules = [
		'descripcion' => 'required',
		'monto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','monto'];



}
