<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Meter;
use App\Models\Notice;
/**
 * Class Lectura
 *
 * @property $id
 * @property $meter_id
 * @property $detalle
 * @property $LecturaANT
 * @property $LecturaACT
 * @property $TotalCubos
 * @property $created_at
 * @property $updated_at
 *
 * @property Meter $meter
 * @property Notice[] $notices
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Lectura extends Model
{
    use HasFactory;
    // static $rules = [
		// 'meter_id' => 'required',
		// 'detalle' => 'required',
		// 'LecturaANT' => 'required',
		// 'LecturaACT' => 'required',
		// 'TotalCubos' => 'required',
    // ];
    // protected $with=['meter','notices'];
    // protected $fillable = ['meter_id','lectura','consumo'];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     * @var array
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notice()
    {
        return $this->hasOne(Notice::class);
    }
}
