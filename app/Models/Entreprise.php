<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property Activite[] $activites
 */
class Entreprise extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'phone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activites()
    {
        return $this->hasMany('App\Models\Activite');
    }
}
