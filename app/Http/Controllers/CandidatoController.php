<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidato;
use App\Http\Requests;


class CandidatoController extends Controller
{
    protected $candidato = null;
    public function __construct(Candidato $candidato)
    {
        $this->candidato = $candidato;
    }
    
    
   public function todosCandidatos()
   {
    $candidatos = Candidato::all();
    return response()->json($candidatos);
   }


   public function consultaCandidato($nome)
   {
     Candidato::consultaCandidato($nome);
   }

   public function incluiCandidato( Request $request)
   {
    
        $candidato = new Candidato();
        $candidato->fill($request->all());
        $candidato['senha'] = \Hash::make($candidato['senha']);
        $candidato->save();
        return response()->json($candidato, 201);
   }

   public function atualizaCandidato(Request $request, $id)
   {
    
        $candidato = Candidato::find($id);
       

        if(!$candidato) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $candidato->fill($request->all());
        $candidato['senha'] = \Hash::make($candidato['senha']);
        $candidato->save();

        return response()->json($candidato);

   }

   public function deletaCandidato($id)
   {
    $candidato = Candidato::find($id);

    if(!$candidato) {
        return response()->json([
            'message'   => 'Record not found',
        ], 404);
    }

    $candidato->delete();
    return response()->json([
        'message'   => 'Record Deleted successfully',
    ], 200);
   }

}


