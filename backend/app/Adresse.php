<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Adresse extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Une adresse peut correspondre à plusieurs personnes.
     *
     * @return HasMany
     */
    public function personnes(): HasMany
    {
        return $this->hasMany('App\Personne');
    }
}
