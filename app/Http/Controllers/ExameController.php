<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExameRequest;
use App\Repositories\ExameRepository;
use App\Services\ExameService;
use App\Services\CategoriaService;

class ExameController extends Controller
{
    public function __construct()
    {
        $this->exameRepository = new ExameRepository;
        $this->exameService = new ExameService;
        $this->categoriaService = new CategoriaService;

    }

    public function index()
    {
        $exames = $this->exameRepository->mostrarTodos();
        return view('exames.index', compact('exames'));
    }

    public function create()
    {
        $categorias = $this->categoriaService->instanciarTodos();
        return view('exames.create', compact('categorias'));
    }

    public function store(ExameRequest $request)
    {
        $exame = $this->exameService->instanciarECriar($request);
        if ($exame) {
            return redirect()->route('exame.index')->with('Success', 'Exame criado com sucesso.')->send();
        } else {
            return redirect()->route('exame.index')->with('Warning', 'Não foi possivel criar exame.')->send();
        }
    }

    public function edit(int $id)
    {
        $exame = $this->exameService->buscarEInstanciar($id);
        return view('exames.edit', compact('exame'));
    }

    public function update(ExameRequest $request)
    {
        $exame = $this->exameService->instanciarEAtualizar($request);
        if ($exame) {
            return redirect()->route('exame.index')->with('Success', 'Exame alterado com sucesso.')->send();
        } else {
            return redirect()->route('exame.index')->with('Warning', 'Não foi possivel alterar exame.')->send();
        }
    }

    public function destroy(int $id)
    {
        $exame = $this->exameRepository->remover($id);
        if ($exame) {
            return redirect()->route('exame.index')->with('Success', 'Exame excluído com sucesso.')->send();
        } else {
            return redirect()->route('exame.index')->with('Warning', 'Não foi possivel excluir exame.')->send();
        }
    }
}
