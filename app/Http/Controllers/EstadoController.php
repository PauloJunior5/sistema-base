<?php

namespace App\Http\Controllers;

use App\Interfaces\EstadoInterface;
use App\Http\Requests\EstadoRequest;
use App\Services\EstadoService;

class EstadoController extends Controller
{
    public function __construct(EstadoInterface $estadoInterface, EstadoService $estadoService)
    {
        $this->estadoInterface = $estadoInterface; //Bind com EstadoRepository
        $this->estadoService = $estadoService; //Bind com EstadoService
    }

    public function index()
    {
        return $this->estadoInterface->index();
    }

    public function create()
    {
        return $this->estadoInterface->create();
    }

    public function store(EstadoRequest $request)
    {
        $estado = $this->estadoService->store($request);
        return $this->estadoInterface->store($estado);
    }

    public function show(EstadoRequest $request)
    {
        return $this->estadoInterface->show($request->id_estado);
    }

    public function edit(int $id)
    {
        return $this->estadoInterface->edit($id);
    }

    public function update(EstadoRequest $request)
    {
        return $this->estadoInterface->update($request);
    }

    public function destroy(int $id)
    {
        return $this->estadoInterface->destroy($id);
    }

    public function createEstado(EstadoRequest $request)
    {
        $estado = $this->estadoService->store($request);
        return $this->estadoInterface->createEstado($estado);
    }
}