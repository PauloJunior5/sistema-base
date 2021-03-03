<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Cidade;
use App\Repositories\EstadoRepository;

class CidadeService 
{
    public function __construct(EstadoRepository $estadoRepository)
    {
        $this->estadoRepository = $estadoRepository;
    }

    public function store(Request $request)
    {
        $cidade = new Cidade;

        $cidade->setCidade($request->get('cidade'));
        $cidade->setDDD($request->get('ddd'));
        $cidade->setCreated_at(Carbon::now()->toDateTimeString());
    
        $estado = $this->estadoRepository->findById($request->id_estado);
        $cidade->setEstado($estado);

        return $cidade;
    }
}