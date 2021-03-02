<?php

namespace App\Http\Controllers;

use App\Interfaces\PaisInterface;
use App\Http\Requests\PaisRequest;
use App\Models\Pais;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function __construct(PaisInterface $paisInterface)
    {
        $this->paisInterface = $paisInterface;
    }

    public function index()
    {
        $paises = $this->paisInterface->index();
        return view('paises.index', ['paises' => $paises]);
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

        $this->paisInterface->store($pais);
    }

    public function show(Request $request)
    {
        return $this->paisInterface->show($request->id_pais);
    }

    public function edit($id)
    {
        $pais = $this->paisInterface->edit($id);
        return view('paises.edit', compact('pais'));
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