<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\CidadeRequest;
use App\Traits\CreateEntities;
use App\Interfaces\CidadeInterface;

class CidadeRepository implements CidadeInterface
{
    // Use CreateEntities Trait in this repository
    use CreateEntities;

    public function index()
    {

    }

    public function create()
    {

    }

    public function store(CidadeRequest $request)
    {

    }

    public function show(CidadeRequest $request)
    {

    }

    public function edit($estado_id)
    {

    }

    public function update(CidadeRequest $request)
    {

    }

    public function destroy($estado_id)
    {

    }

    public function createCidade(CidadeRequest $request)
    {

    }

    public function createCidadeMedico(CidadeRequest $request)
    {

    }


}
