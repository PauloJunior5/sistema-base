<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Repositories\CategoriaRepository;
use App\Services\CategoriaService;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->categoriaRepository = new CategoriaRepository;
        $this->categoriaService = new CategoriaService;
    }

    public function index()
    {
        $categorias = $this->categoriaService->instanciarTodos();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        $this->categoriaService->instanciarECriar($request);
    }

    public function show(int $id)
    {
        return response()->json($this->categoriaRepository->findById($id));
    }

    public function edit(int $id)
    {
        $categoria = $this->categoriaService->buscarEInstanciar($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request)
    {
        $this->categoriaService->instanciarEAtualizar($request);
    }

    public function destroy(int $id)
    {
        $categoria = $this->categoriaRepository->remover($id);
        if ($pais) {
            return redirect()->route('pais.index')->with('Success', 'País excluído com sucesso.');
        } else {
            return redirect()->route('pais.index')->with('Warning', 'Não foi possivel excluir país. Verifique se existe vínculo com cidades e/ou estados.');
        }
    }
}