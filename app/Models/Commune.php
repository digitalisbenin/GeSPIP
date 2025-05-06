<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $departement_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property Activite[] $activites
 * @property Departement $departement
 */
class Commune extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['departement_id', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activites()
    {
        return $this->hasMany('App\Models\Activite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }
}
