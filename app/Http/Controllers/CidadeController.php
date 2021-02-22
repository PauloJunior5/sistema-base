<?php

namespace App\Http\Controllers;

use App\Http\Requests\CidadeRequest;
use App\Interfaces\CidadeInterface;

class CidadeController extends Controller
{
    public function __construct(CidadeInterface $cidadeInterface)
    {
        $this->cidadeInterface = $cidadeInterface;
    }
    
    public function index()
    {
        return $this->cidadeInterface->index();
    }

    public function create()
    {
        return $this->cidadeInterface->create();
    }

    public function store(CidadeRequest $request)
    {
        return $this->cidadeInterface->store($request);
    }

    public function show(CidadeRequest $request)
    {
        return $this->cidadeInterface->show($request);
    }

    public function edit($id_cidade)
    {
        return $this->cidadeInterface->edit($id_cidade);
    }

    public function update(CidadeRequest $request)
    {
        return $this->cidadeInterface->update($request);
    }

    public function destroy($id_cidade)
    {
        return $this->cidadeInterface->destroy($id_cidade);
    }

    public function createCidade(CidadeRequest $request)
    {
        return $this->cidadeInterface->createCidade($request);
    }

    public function createCidadeMedico(CidadeRequest $request)
    {
        return $this->cidadeInterface->createCidadeMedico($request);
    }
}