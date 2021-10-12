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
        $category = $this->categoriaService->getCategorieById($id);
        return new CategoriaResource($category);
    }

    public function edit($id)
    {
        $categoria = $this->show($id);
        return view('categorias.edit', compact('categoria'));
    }

    public function update(StoreUpdateCategoria $request, $id)
    {
        $category = $this->categoriaService->updateCategory($id, $request->except(['_token', '_method']));
        if ($category) {
            return redirect()->route('categoria.index')->with('Success', 'Categoria alterada com sucesso.')->send();
        } else {
            return redirect()->route('categoria.index')->with('Warning', 'Não foi possivel alterada categoria.')->send();
        }
    }

    public function destroy($id)
    {
        $category = $this->categoriaService->destroyCategorie($id);
        return $category;
    }
}