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

    /**
     * Seleciona todas as categorias
     * @return array
    */
    public function getAllCategories()
    {
        $results = $this->categoryRepository->getAllCategories();

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

    /**
     * Seleciona uma categoria pelo ID
     * @param int $id
     * @return object
    */
    public function getCategorieById(int $id)
    {
        return $this->categoryRepository->getCategorieById($id);
    }

    /**
     * Cria uma nova categoria
     * @param array $categorie
     * @return object 
    */
    public function makeCategory(array $categoria)
    {
        $categoria['created_at'] = now()->toDateTimeString();
        return $this->categoryRepository->createCategorie($categoria);
    }

    /**
     * Atualiza uma categoria
     * @param int $id
     * @param arrray $dados
     * @return json response
    */
    public function updateCategory(int $id, array $dados)
    {
        $category = $this->categoryRepository->getCategorieById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        $dados['updated_at'] = now()->toDateTimeString();

        return $this->categoryRepository->updateCategorie($dados);
    }

    /**
     * Deleta uma categoria
     * @param int $id
     * @return json response
    */
    public function destroyCategorie(int $id)
    {
        $category = $this->categoryRepository->getCategorieById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        $this->categoryRepository->destroyCategorie($category);

        return response()->json(['message' => 'Category Deleted'], 200);
    }
}