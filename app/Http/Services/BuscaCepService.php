<?php
namespace App\Http\Services;
use App\Http\Repository\BuscaCepRepository;
use Illuminate\Http\Request;

class BuscaCepService {


    /**
     * @var BuscaCepRepository
     */
    private $BuscaCepRepository;

    public function __construct(BuscaCepRepository $BuscaCepRepository)
    {
        $this->BuscaCepRepository = $BuscaCepRepository;
    }

    public function findCep (Request $request)
    {
        $cep = $this->BuscaCepRepository->findCep($request);
        return $cep;
    }

    public function findCepName (Request $request)
    {
        $cep = $this->BuscaCepRepository->findCepName($request);
        return $cep;
    }
}
