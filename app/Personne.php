<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $table = 'personne';
    public $timestamps = false;

    // Relation avec le type de personne
    public function typepersonne()
    {
        return $this->belongsTo(TypePersonne::class, 'idtypepersonne');
    }
}
