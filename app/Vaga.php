<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Vaga extends Model
{
    protected $table = "vagas";
    protected $guarded =['id','create_at','updated_at'];
}
