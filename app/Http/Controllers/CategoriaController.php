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
    }

    public function destroy(int $id)
    {
    }
}
