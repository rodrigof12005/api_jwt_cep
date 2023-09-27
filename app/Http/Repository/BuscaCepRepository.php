<?php

namespace App\Http\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class BuscaCepRepository
{

    public function findCep(Request $request)
    {
        $request->validate([
            'cep' => 'required'
        ]);
       $cep_number =  $request->cep;
       $url = Http::get('https://viacep.com.br/ws/'.$cep_number.'/json');
       $api = $url->json();

        if ($url->successful()) {
            return response()->json($api);
        } else {
            return response()->json(['error' => 'CEP not found'], 404);
        }
    }

    public function findCepName(Request $request)
    {
        $request->validate([
            'cep_state' => 'required',
            'cep_city' => 'required',
            'cep_region' => 'required'
        ]);

       $url = Http::get('https://viacep.com.br/ws/'.$request->cep_state.'/'.$request->cep_city.'/'.$request->cep_region.'/json');
       $api = $url->json();

        if ($url->successful()) {
            return response()->json($api);
        } else {
            return response()->json(['error' => 'CEP not found'], 404);
        }
    }
}
