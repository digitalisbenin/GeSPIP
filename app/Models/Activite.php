<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $nature_activite_id
 * @property integer $projet_id
 * @property string $titre_activite
 * @property string $departement
 * @property string $commune
 * @property string $arrondissement
 * @property string $ville
 * @property string $coordonnéeGPS
 * @property string $etat_chantier
 * @property string $cout_activite
 * @property string $description
 * @property string $dure_execution
 * @property string $annee_execution
 * @property string $mode_execution
 * @property string $entreprise
 * @property string $phone_entreprise
 * @property string $created_at
 * @property string $updated_at
 * @property NatureActivite $natureActivite
 * @property Projet $projet
 * @property Contrat[] $contrats
 */
class Activite extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['nature_activite_id', 'projet_id', 'titre_activite', 'departement', 'commune', 'arrondissement', 'ville', 'coordonnéeGPS', 'etat_chantier', 'cout_activite', 'description', 'dure_execution', 'annee_execution', 'mode_execution', 'entreprise', 'phone_entreprise', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function natureActivite()
    {
        return $this->belongsTo('App\Models\NatureActivite');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projet()
    {
        return $this->belongsTo('App\Models\Projet');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat');
    }
}
