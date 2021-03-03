<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Pais;
use App\Http\Requests\PaisRequest;
use App\Repositories\PaisRepository;

class PaisService 
{
    public function __construct(PaisRepository $paisRepository)
    {
        $this->paisRepository = $paisRepository; //Bind com PaisService
    }

    public function index()
    {
        return $this->paisRepository->index();
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(PaisRequest $request)
    {
        $pais = new Pais;

        $pais->setPais($request->get('pais'));
        $pais->setSigla($request->get('sigla'));
        $pais->setCreated_at(Carbon::now()->toDateTimeString());

        return $this->paisRepository->store($pais);
    }

    public function show(PaisRequest $request)
    {
        return $this->paisRepository->index($request->id_pais);
    }

    public function edit(int $id)
    {
        return $this->paisRepository->edit($id);
    }

    public function update(Request $request)
    {
        $pais = new Pais;

        $pais->setId($request->id);
        $pais->setPais($request->pais);
        $pais->setSigla($request->sigla);
        $pais->setCreated_at($request->created_at);
        $pais->setUpdated_at(Carbon::now()->toDateTimeString());

        return $this->paisRepository->update($pais);
    }

    public function destroy(int $id)
    {
        return $this->paisRepository->destroy($id);
    }

    public function createPais(PaisRequest $request)
    {
        $pais = new Pais;

        $pais->setPais($request->get('pais'));
        $pais->setSigla($request->get('sigla'));
        $pais->setCreated_at(Carbon::now()->toDateTimeString());

        return $this->paisRepository->createPais($pais);
    }
}