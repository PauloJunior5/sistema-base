<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Services\PaisService;


class PaisController extends Controller
{
    public function __construct(PaisService $paisService)
    {
        $this->paisService = $paisService; //Bind com PaisService
    }

    public function index()
    {
        return $this->paisService->index();
    }

    public function create()
    {
        return $this->paisService->create();
    }

    public function store(PaisRequest $request)
    {
        return $this->paisService->store($request);
    }

    public function show(PaisRequest $request)
    {
        return $this->paisService->show($request->id_pais);
    }

    public function edit(int $id)
    {
        return $this->paisService->edit($id);
    }

    public function update(PaisRequest $request)
    {
        return $this->paisService->update($request);
    }

    public function destroy(int $id)
    {
        return $this->paisService->destroy($id);
    }

    public function createPais(PaisRequest $request)
    {
        return $this->paisService->createPais($request);
    }
}