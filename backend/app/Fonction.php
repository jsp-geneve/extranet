<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fonction extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Les moniteurs auxquels cette fonction est assignée.
     *
     * @return BelongsToMany
     */
    public function moniteurs(): BelongsToMany
    {
        return $this->belongsToMany('App\Moniteur');
    }
}
