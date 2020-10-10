<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = [
        'poste','id_user','état_candidature','lien','entreprise','lieu','mail','téléphone',
    ];
    public $timestamps = true;
}
