<?php

namespace App\Http\Controllers;

use App\Interfaces\PaisInterface;
use App\Http\Requests\PaisRequest;
use App\Models\Pais;
use App\Services\PaisService;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $pais = new Pais;

        $pais->setId($request->id);
        $pais->setPais($request->pais);
        $pais->setSigla($request->sigla);
        $pais->setUpdated_at($request->created_at);
        $pais->setUpdated_at(Carbon::now()->toDateTimeString());

        return $this->paisInterface->update($pais);
    }

    public function destroy($id)
    {
        return $this->paisInterface->destroy($id);
    }

    public function createPais(PaisRequest $request)
    {
        $pais = new Pais;

        $pais->setPais($request->get('pais'));
        $pais->setSigla($request->get('sigla'));
        $pais->setCreated_at(Carbon::now()->toDateTimeString());

        return $this->paisInterface->createPais($pais);
    }
}