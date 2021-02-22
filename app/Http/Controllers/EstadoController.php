<?php

namespace App\Http\Controllers;

use App\Interfaces\EstadoInterface;
use App\Http\Requests\EstadoRequest;

class EstadoController extends Controller
{
    public function __construct(EstadoInterface $estadoInterface)
    {
        $this->estadoInterface = $estadoInterface;
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
        return $this->estadoInterface->store($request);
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
        return $this->estadoInterface->createEstado($request);
    }
}