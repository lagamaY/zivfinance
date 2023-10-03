<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePersonne extends Model
{
    //
    protected $table = 'typepersonne';
    public $timestamps = false;

    // Relation avec le modèle Personne
    public function personnes()
    {
        return $this->hasMany(Personne::class, 'idtypepersonne');
    }
}
