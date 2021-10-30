<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanoRequest;
use App\Repositories\PlanoRepository;
use App\Services\PlanoService;

class PlanoController extends Controller
{
    public function __construct()
    {
        $this->planoRepository = new PlanoRepository;
        $this->planoService = new PlanoService;
    }

    public function index()
    {
        $planos = $this->planoService->instanciarTodos();
        return view('planos.index', compact('planos'));
    }

    public function create()
    {
        return view('planos.create');
    }

    public function store(PlanoRequest $request)
    {
        $plano = $this->planoService->instanciarECriar($request);

        if (!$plano) {
            return redirect()->route('plano.index')->with('Warning', 'Não foi possivel criar plano!');
        }

        return redirect()->route('plano.index')->with('Success', 'Plano criado com sucesso!')->send();

    }

    public function show(int $id)
    {
        return response()->json($this->planoRepository->findById($id));
    }

    public function edit(int $id)
    {
        $plano = $this->planoService->buscarEInstanciar($id);
        return view('planos.edit', compact('plano'));
    }

    public function update(PlanoRequest $request)
    {
        $this->planoService->instanciarEAtualizar($request);
    }

    public function destroy(int $id)
    {
        $this->planoRepository->remover($id);
    }

    // public function createCategoria(PlanoRequest $request)
    // {
    //     $cidade = $this->planoService->instanciarECriar($request);

    //     if (!$cidade) {
    //         return redirect()->back()->withInput()->send();
    //     }

    //     return redirect()->back()->withInput()->with('error_code', 10)->send();
    // }
}