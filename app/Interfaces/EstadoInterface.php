<?php

namespace App\Interfaces;

use App\Http\Requests\EstadoRequest;

interface EstadoInterface
{
    public function index();
    public function create();
    public function store(EstadoRequest $estado);
    public function show(EstadoRequest $estado);
    public function edit(int $id);
    public function update(EstadoRequest $estado);
    public function destroy(int $id);
    public function createEstado(EstadoRequest $estado);
}