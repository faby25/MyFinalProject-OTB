<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Meter;
use App\Models\Lectura;
/**
 * Class Notice
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Notice extends Model
{
  // protected $with=[ 'lectura'];//todos los post incluiran su categoria y usuario o autor
  // protected $fillable = ['lectura_id','total','detalle','pagado','fechaVencimiento'];

    // static $rules = [
    // ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    // protected $fillable = [];

    // public function meter(){
    //   return $this->belongsTo(Meter::class);
    // }
    public function lectura(){
      return $this->belongsTo(Lectura::class);
    }

}
