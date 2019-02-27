<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidatura;
use App\Candidato;
use App\Http\Requests;




class CandidaturaController extends Controller
{
    protected $candidato = null;
    protected $vaga = null;

    public function __construct( Candidatura $candidatura)
    {
       
        $this->candidatura = $candidatura;
    }
    
    public function todasCandidaturas()
    {
       Candidatura::todascandidaturas();

    }
    public function consultaCandidaturas($nome)
    {
       Candidatura::consultaCandidaturas($nome);
    }

    public function atualizaCandidatura(Request $request, $id)
    {
       
        $candidatura = Candidatura::find($id);
              

        if(!$candidatura) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $candidatura->fill($request->all());
        $candidatura->save();

        return response()->json($candidatura);
    }


    public function incluirCandidatura(Request $request)
    {
        $candidatura = new Candidatura();
        $candidatura->fill($request->all());
        $candidatura->save();
        return response()->json($candidatura, 201);
    }


    
   
    public function deletaCandidatura($id)
    {
        $candidatura = Candidatura::find($id);

        if(!$candidatura) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
    
        $candidatura->delete();
        return response()->json([
            'message'   => 'Record Deleted successfully',
        ], 200);
       
    
    }
}

