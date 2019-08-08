<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personne extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Chaque personne a une adresse.
     *
     * @return BelongsTo
     */
    public function adresse(): BelongsTo
    {
        return $this->belongsTo('App\Adresse');
    }

    /**
     * Une personne peut être un jeune sapeur.
     *
     * @return HasOne
     */
    public function jeuneSapeur(): HasOne
    {
        return $this->hasOne('App\JeuneSapeur');
    }

    /**
     * Une personne peut être un responsable légal.
     *
     * @return HasOne
     */
    public function responsableLegal(): HasOne
    {
        return $this->hasOne('App\ResponsableLegal');
    }

    /**
     * Retourne le membre incarné par la personne.
     *
     * @return mixed
     */
    public function membre()
    {
        return $this->jeuneSapeur ?? $this->responsableLegal;
    }
}
