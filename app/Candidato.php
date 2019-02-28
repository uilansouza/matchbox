<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class Candidato extends Model
{
   protected $table = "candidatos";
   protected $guarded =['id','create_at', 'updated_at'];

   public  static function consultaCandidato($nome)
   {
      $candidato = DB::table('candidatos as cd')
      ->select('cd.nome', 'cd.email','cd.cpf','cd.instituicao','cd.graduacao','cd.ano_conclusao')
      ->where('cd.nome', 'like', "%$nome%")
      ->get();
     
      $json = json_decode($candidato);
      echo json_encode($json, JSON_PRETTY_PRINT);
   }

   public static function consultaduplicidade($email)
   {
      //$email = 'porta@uol.com.br';
      
      $candidato = DB::table('candidatos as cd')
      ->select('cd.nome', 'cd.email','cd.cpf','cd.instituicao','cd.graduacao','cd.ano_conclusao')
      ->where('cd.email', 'like', "%$email%")
      ->get();
         

      $json = json_decode($candidato);
      
       if($json)
       return true;
       return false;
      //return $candidato;
      
   
     
      
   }

}
