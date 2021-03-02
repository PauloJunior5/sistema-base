<?php

namespace App\Http\Controllers;

use App\Interfaces\EstadoInterface;
use App\Http\Requests\EstadoRequest;
use App\Models\Estado;
use App\Repositories\PaisRepository;
use App\Services\EstadoService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    public function __construct(EstadoInterface $estadoInterface, EstadoService $estadoService)
    {
        $this->estadoInterface = $estadoInterface;
        // $this->paisRepository = new PaisRepository();
        $this->estadoService = $estadoService;
    }

    public function index()
    {
        return $this->estadoInterface->index();
    }

    public function create()
    {
        return $this->estadoInterface->create();
    }

    public function store(Request $request)
    {
        $estado = $this->estadoService->store($request);
        return $this->estadoInterface->store($estado);
    }

    public function show(EstadoRequest $request)
    {
        return $this->estadoInterface->show($request);
    }

    public function edit($estado_id)
    {
        return $this->estadoInterface->edit($estado_id);
    }

    public function update(EstadoRequest $request)
    {
        return $this->estadoInterface->update($request);
    }

    public function destroy($estado_id)
    {
        return $this->estadoInterface->destroy($estado_id);
    }

    public function createEstado(EstadoRequest $request)
    {
        $estado = new Estado;

        $estado->setEstado($request->get('estado'));
        $estado->setUF($request->get('uf'));
        $estado->setCreated_at(Carbon::now()->toDateTimeString());

        $pais = $this->paisRepository->findPais($request->id_pais);
        $estado->setPais($pais);

        return $this->estadoInterface->createEstado($request);
    }
}