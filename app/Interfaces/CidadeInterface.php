<?php

namespace App\Interfaces;

use App\Http\Requests\CidadeRequest;

interface CidadeInterface
{
    public function index();
    public function create();
    public function store(CidadeRequest $request);
    public function show(CidadeRequest $request);
    public function edit($estado_id);
    public function update(CidadeRequest $request);
    public function destroy($estado_id);
    public function createCidade(CidadeRequest $request);
    public function createCidadeMedico(CidadeRequest $request);
}