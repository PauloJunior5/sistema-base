<?php

namespace App\Interfaces;

use App\Http\Requests\EstadoRequest;

interface EstadoInterface
{
    public function index();
    public function create();
    public function store(EstadoRequest $request);
    public function show(EstadoRequest $request);
    public function edit($estado_id);
    public function update(EstadoRequest $request);
    public function destroy($estado_id);
    public function createEstado(EstadoRequest $request);
}