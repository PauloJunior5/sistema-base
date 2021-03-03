<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Estado;
use App\Repositories\PaisRepository;

class EstadoService 
{
    public function __construct(PaisService $paisService, PaisRepository $paisRepository)
    {
        $this->paisRepository = $paisRepository;
        $this->paisService = $paisService; //Bind com PaisService

    }

    public function store(Request $request)
    {
        $estado = new Estado;

        $estado->setEstado($request->get('estado'));
        $estado->setUF($request->get('uf'));
        $estado->setCreated_at(Carbon::now()->toDateTimeString());
    
        $pais = $this->paisService->findById($request->id_pais);
        $estado->setPais($pais);

        return $estado;
    }
}