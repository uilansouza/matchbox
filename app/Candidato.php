<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = "candidatos";

   protected $guarded =['id','create_at', 'updated_at'];
}
