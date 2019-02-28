<?php

namespace App;
use App\Candidato;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
     
     protected $table='candidatura';
     protected $fillable = ['id_candidatos', 'id_vagas'];



     public  static function  todascandidaturas()
     
     {
           $candidaturas = DB::table('candidatos as cd')
          ->join('candidatura as ca', 'cd.id', '=', 'ca.id_candidatos')
          ->join('vagas as va', 'ca.id_vagas', '=', 'va.id')
          ->select('ca.id as Codigo candidatura','cd.nome', 'cd.email', 'va.nome_vaga as Vaga')
          ->get();

         
          $json = json_decode($candidaturas);
           echo json_encode($json, JSON_PRETTY_PRINT);
                 
         /*
          $query = "SELECT cd.nome as 'Nome',  cd.email as 'E-mail',  cd.graduacao as 'Graduacao', va.nome_vaga as'Vaga'
          FROM candidatos cd
          JOIN candidatura ca ON(cd.id = ca.id_candidatos )
          JOIN  vagas va ON (ca.id_vagas = va.id); "
          */
     }


     public  static function  consultaCandidaturas($nome){

          
          $candidaturas = DB::table('candidatos as cd')
          ->join('candidatura as ca', 'cd.id', '=', 'ca.id_candidatos')
          ->join('vagas as va', 'ca.id_vagas', '=', 'va.id')
          ->select('ca.id as Codigo candidatura','cd.nome', 'cd.email', 'va.nome_vaga as Vaga')
          ->where('cd.nome', 'like', "%$nome%")
          ->get();

          $json = json_decode($candidaturas);
          echo json_encode($json, JSON_PRETTY_PRINT);
          
     }

     public static function consultarDuplicidadeCandidatura($id_candidatos, $id_vagas){
        /*  $idCandidatos = 6;
          $id_vagas = 1;*/
          
          $candidaturas = DB::table('candidatura as ca')
          ->select('ca.id_candidatos', 'ca.id_vagas')
          ->where('ca.id_candidatos','=',"$id_candidatos" )
          ->where('ca.id_vagas','=',"$id_vagas")
          ->get();

          $json = json_decode($candidaturas);
          //echo json_encode($json, JSON_PRETTY_PRINT);

          if($json)
           return true;
           return false;

          /**
           * select * from candidatura where id_candidatos = 6 AND id_vagas = 1;
           */
     }


   
}
