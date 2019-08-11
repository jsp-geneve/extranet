<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

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
     * Une personne peut être un moniteur.
     *
     * @return HasOne
     */
    public function moniteur(): HasOne
    {
        return $this->hasOne('App\Moniteur');
    }

    /**
     * Retourne le(s) membre(s) incarné(s) par la personne.
     *
     * @return Collection
     */
    public function membres(): Collection
    {
        return collect([
            $this->jeuneSapeur,
            $this->responsableLegal,
            $this->moniteur,
        ])->filter();
    }
}
