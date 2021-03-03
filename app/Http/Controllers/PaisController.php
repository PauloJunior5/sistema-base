<?php

namespace App\Http\Controllers;

use App\Interfaces\PaisInterface;
use App\Http\Requests\PaisRequest;
use App\Services\PaisService;


class PaisController extends Controller
{
    public function __construct(PaisInterface $paisInterface, PaisService $paisService)
    {
        $this->paisInterface = $paisInterface; //Bind com PaisRepository
        $this->paisService = $paisService; //Bind com PaisService
    }

    public function index()
    {
        return $this->paisInterface->index();
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(PaisRequest $request)
    {
        $pais = $this->paisService->store($request);
        $this->paisInterface->store($pais);
    }

    public function show(PaisRequest $request)
    {
        return $this->paisInterface->show($request->id_pais);
    }

    public function edit(int $id)
    {
        return $this->paisInterface->edit($id);
    }

    public function update(PaisRequest $request)
    {
        return $this->paisInterface->update($request);
    }

    public function destroy(int $id)
    {
        return $this->paisInterface->destroy($id);
    }

    public function createPais(PaisRequest $request)
    {
        $pais = $this->paisService->store($request);
        return $this->paisInterface->createPais($pais);
    }
}