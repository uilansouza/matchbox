<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Candidato extends Model
{
   protected $table = "candidatos";
   protected $guarded =['id','create_at', 'updated_at'];


  

}
