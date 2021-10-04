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
        $categories = $this->categoriaService->getAllCategories();
        return CategoriaResource::collection($categories);
    }

    public function store(StoreUpdateCategoria $request)
    {
        $category = $this->categoriaService->makeCategory($request->all());
        return new CategoriaResource($category);
    }

    public function show($id)
    {
        $category = $this->categoriaService->getCategorieById($id);
        return new CategoriaResource($category);
    }

    public function update(StoreUpdateCategoria $request, $id)
    {
        $category = $this->categoriaService->updateCategory($id, $request->all());
        return $category;
    }

    public function destroy($id)
    {
        $category = $this->categoriaService->destroyCategorie($id);
        return $category;
    }
}