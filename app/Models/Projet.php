<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_projet_id
 * @property string $titre_projet
 * @property string $intituler_projet
 * @property string $cout_global
 * @property string $created_at
 * @property string $updated_at
 * @property Activite[] $activites
 * @property TypeProjet $typeProjet
 */
class Projet extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type_projet_id', 'titre_projet', 'intituler_projet', 'cout_global', 'created_at', 'updated_at'];

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
    public function typeProjet()
    {
        return $this->belongsTo('App\Models\TypeProjet');
    }
}
