<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaisRequest;
use App\Interfaces\PaisInterface;
use App\Repositories\PaisRepository;
use App\Services\PaisService;

class PaisController extends Controller implements PaisInterface
{
    public function __construct(PaisRepository $paisRepository, PaisService $paisService)
    {
        $this->paisRepository = $paisRepository; //Bind com PaisRepository
        $this->paisService = $paisService; //Bind com PaisService
    }

    public function index()
    {
        $paises = $this->paisRepository->index();
        return view('paises.index', compact('paises'));
    }

    public function create()
    {
        return view('paises.create');
    }

    public function store(PaisRequest $request)
    {
        $pais = $this->paisService->instanciarECriar($request);

        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'Pais criado com sucesso.')->send();
        } else {
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel criar país.')->send();
        }
    }

    public function show(PaisRequest $request)
    {
        $pais = $this->paisRepository->findById($request->id_pais);
        return response()->json($pais);
    }

    public function edit(int $id)
    {
        $pais = $this->paisRepository->findById($id);
        return view('paises.edit', compact('pais'));
    }

    public function update(PaisRequest $request)
    {
        $pais = $this->paisService->instanciarEAtualizar($request);

        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'País alterado com sucesso.');
        } else {
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel editar país.');
        }

    }

    public function destroy(int $id)
    {
        $pais = $this->paisRepository->removerPais($id);

        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'País excluído com sucesso.');
        } else {
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel excluir país. Verifique se existe vínculo com cidades e/ou estados.');
        }

    }

    public function createPais(PaisRequest $request)
    {
        $pais = $this->paisService->instanciarECriar($request);

        if ($pais) {
            return redirect()->back()->withInput()->with('error_code', 4)->send();
        } else {
            return redirect()->back()->withInput()->send();
        }
    }
}