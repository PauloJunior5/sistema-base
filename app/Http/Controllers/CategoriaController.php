<?php

namespace App\Http\Controllers;

use App\Services\CategoriaService;
use App\Http\Requests\StoreUpdateCategoria;
use App\Http\Resources\CategoriaResource;

class CategoriaController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function index()
    {
        $categorias = $this->categoriaService->getAllCategories();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(StoreUpdateCategoria $request)
    {
        $category = $this->categoriaService->makeCategory($request->except(['_token', '_method']));
        if ($category) {
            return redirect()->route('categoria.index')->with('Success', 'Categoria criada com sucesso.')->send();
        } else {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel criar categoria.')->send();
        }
    }

    public function show($id)
    {
        $categoria = $this->categoriaService->getCategorieById($id);
        return $categoria;
    }

    public function edit($id)
    {
        $categoria = $this->categoriaService->getCategorieById($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(StoreUpdateCategoria $request)
    {
        $category = $this->categoriaService->updateCategory($request->id, $request->except(['_token', '_method']));
        if ($category) {
            return redirect()->route('categoria.index')->with('Success', 'Categoria alterada com sucesso.')->send();
        } else {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel alterada categoria.')->send();
        }
    }

    public function destroy($id)
    {
        $category = $this->categoriaService->destroyCategorie($id);
        if ($category) {
            return redirect()->route('categoria.index')->with('Success', 'Categoria excluida com sucesso.')->send();
        } else {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel excluir categoria.')->send();
        }
    }
}