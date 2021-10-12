<?php

namespace App\Services;

use App\Models\Categoria;
use App\Repositories\Contracts\CategoriaRepositoryInterface;
use Illuminate\Support\Str;

class CategoriaService
{
    protected $categoryRepository;

    public function __construct(CategoriaRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        $results = $this->categoryRepository->mostrarTodos();

        $categorias = collect();

        foreach ($results as $result) {
            $categoria = new Categoria();
            $categoria->setId($result->id);
            $categoria->setCreated_at($result->created_at ?? null);
            $categoria->setUpdated_at($result->updated_at ?? null);
            $categoria->setCategoria($result->categoria);
            $categorias->push($categoria);
        }

         return $categorias;
    }


    public function getCategorieById(int $id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function makeCategory(array $categoria)
    {
        $categoria['created_at'] = now()->toDateTimeString();
        return $this->categoryRepository->adicionar($categoria);
    }

    public function updateCategory(int $id, array $dados)
    {
        $category = $this->categoryRepository->findById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        $dados['updated_at'] = now()->toDateTimeString();

        return $this->categoryRepository->atualizar($dados);
    }

    public function destroyCategorie(int $id)
    {
        $category = $this->categoryRepository->findById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        return $this->categoryRepository->remover($id);
    }
}