<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato_has_vagas extends Model
{
     protected $table='vagacandidato_has_vagas';
     protected $fillable = ['id_candidatos', 'id_vagas'];
}
