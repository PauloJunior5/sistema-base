<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;

use App\Interfaces\PaisInterface;

class PaisController extends Controller
{
    public function __construct(PaisInterface $paisInterface)
    {
        $this->paisInterface = $paisInterface;
    }

    public function index()
    {
        return $this->paisInterface->index();
    }

    public function create()
    {
        return $this->paisInterface->create();
    }

    public function store(PaisRequest $request)
    {
        return $this->paisInterface->store($request);
    }

    public function edit($pais_id)
    {
        return $this->paisInterface->edit($pais_id);
    }

    public function update(PaisRequest $request)
    {
        return $this->paisInterface->update($request);
    }

    public function destroy($pais_id)
    {
        return $this->paisInterface->destroy($pais_id);
    }

    public function createPais(PaisRequest $request)
    {
        return $this->paisInterface->createPais($request);
    }
}
