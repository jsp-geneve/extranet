<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fonction extends Model
{
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
