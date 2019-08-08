<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class JeuneSapeur extends Model
{
    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jeunes_sapeurs';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Chaque jeune sapeur est incorporé à un groupe.
     *
     * @return BelongsTo
     */
    public function groupe(): BelongsTo
    {
        return $this->belongsTo('App\Groupe');
    }

    /**
     * Chaque jeune sapeur correspond à une personne.
     *
     * @return BelongsTo
     */
    public function personne(): BelongsTo
    {
        return $this->belongsTo('App\Personne');
    }

    /**
     * Chaque jeune sapeur a plusieurs responsables légaux,
     * qui peuvent être responsables de plusieurs jeunes sapeurs.
     *
     * @return BelongsToMany
     */
    public function responsablesLegaux(): BelongsToMany
    {
        return $this->belongsToMany('App\Personne', 'responsables_legaux', 'jeune_sapeur_id', 'personne_id');
    }
}
