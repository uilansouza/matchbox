<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vaga;

class VagasController extends Controller
{
    protected $vagas = null;
    public function __construct(Vaga $vagas)
    {
        $this->vagas = $vagas;
    }

    public function TodasVagas()
    {
        $vagas = Vaga::all();
        return response()->json($vagas);

        

    }
    public function consultaVaga ($id)
    {

        $vagas = Vaga::find($id);

        if(!$vagas) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($vagas);
   
    }

    public function incluiVaga (Request $request)
    {
        $vagas = new Vaga();
        $vagas->fill($request->all());
        $vagas->save();
        return response()->json($vagas, 201);
      

    }

    public function atualizaVaga (Request $request, $id)
    {
        $vagas = Vaga::find($id);

        if(!$vagas) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $vagas->fill($request->all());
        $vagas->save();

        return response()->json($vagas);

    }

    public function deletaVaga ($id)
    {
        $vagas = Vaga::find($id);

        if(!$vagas) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
    
        $vagas->delete();
        return response()->json([
            'message'   => 'Record Deleted successfully',
        ], 200);
       }

    }
    



    

