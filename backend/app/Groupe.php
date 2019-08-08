<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Groupe extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Un groupe est constitué de plusieurs jeunes sapeurs.
     *
     * @return HasMany
     */
    public function jeunesSapeurs(): HasMany
    {
        return $this->hasMany('App\JeuneSapeur');
    }
}
