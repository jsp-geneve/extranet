<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Moniteur extends Model
{
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * La personne à laquelle ce moniteur correspond.
     *
     * @return BelongsTo
     */
    public function personne(): BelongsTo
    {
        return $this->belongsTo('App\Personne');
    }

    /**
     * Les fonctions assignées à ce moniteur.
     *
     * @return BelongsToMany
     */
    public function fonctions(): BelongsToMany
    {
        return $this->belongsToMany('App\Fonction');
    }
}
