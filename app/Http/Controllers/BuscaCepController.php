<?php

namespace App\Http\Controllers;

use App\Http\Services\BuscaCepService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BuscaCepController extends Controller
{
    /**
     * @var BuscaCepService
     */
    private $BuscaCepService;

    public function __construct(BuscaCepService $BuscaCepService)
    {
        $this->BuscaCepService = $BuscaCepService;
    }

    public function findCep(Request $request )
    {
        $cep = $this->BuscaCepService->findCep($request);
        return $cep;
    }

    public function findCepName(Request $request )
    {
        $cep = $this->BuscaCepService->findCepName($request);
        return $cep;
    }


}
