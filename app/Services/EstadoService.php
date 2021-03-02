<?php

namespace App\Services;

use App\Interfaces\EstadoInterface;
use App\Http\Requests\EstadoRequest;
use App\Models\Estado;
use App\Repositories\PaisRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstadoService 
{
    public function __construct(PaisRepository $paisRepository)
    {
        $this->paisRepository = $paisRepository;
    }

    public function store(Request $request)
    {
        $estado = new Estado;

        $estado->setEstado($request->get('estado'));
        $estado->setUF($request->get('uf'));
        $estado->setCreated_at(Carbon::now()->toDateTimeString());
    
        $pais = $this->paisRepository->findPais($request->id_pais);
        $estado->setPais($pais);

        return $estado;
    }
}