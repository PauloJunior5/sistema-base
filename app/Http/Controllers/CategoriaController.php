<?php

namespace App\Http\Controllers;

use App\Services\CategoriaService;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        $categorias = $this->categoriaService->listar();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(CategoriaRequest $request)
    {
        $category = $this->categoriaService->adicionar($request->except(['_token', '_method']));

        if (!$category) {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel criar categoria.')->send();
        }

        return redirect()->route('categoria.index')->with('Success', 'Categoria criada com sucesso.')->send();
    }

    public function show($id)
    {
        $categoria = $this->categoriaService->findById($id);
        return $categoria;
    }

    public function edit($id)
    {
        $categoria = $this->categoriaService->findById($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(CategoriaRequest $request)
    {
        $category = $this->categoriaService->atualizar($request->except(['_token', '_method']));

        if (!$category) {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel alterar categoria.')->send();
        }

        return redirect()->route('categoria.index')->with('Success', 'Categoria alterada com sucesso.')->send();
    }

    public function destroy($id)
    {
        $category = $this->categoriaService->remover($id);

        if (!$category) {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel excluir categoria.')->send();
        }

        return redirect()->route('categoria.index')->with('Success', 'Categoria excluida com sucesso.')->send();
    }
}