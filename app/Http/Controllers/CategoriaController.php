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
        $categoria = $this->categoriaService->instanciarECriar($request);

        if (!$categoria) {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel criar categoria!');
        }

        return redirect()->route('categoria.index')->with('Success', 'Categoria criada com sucesso!')->send();

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
        $this->categoriaRepository->remover($id);
    }

    public function createCategoria(CategoriaRequest $request)
    {
        $cidade = $this->categoriaService->instanciarECriar($request);

        if (!$cidade) {
            return redirect()->back()->withInput()->send();
        }

        return redirect()->back()->withInput()->with('error_code', 10)->send();
    }
}