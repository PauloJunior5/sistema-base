<?php

namespace App\Services;

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
     * Selecione todas as categorias
     * @return array
    */
    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
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
    public function makeCategory(array $categorie)
    {
        $categorie['url'] = Str::kebab($categorie['name']);
        $categorie['uuid'] = Str::uuid();

        return $this->categoryRepository->createCategorie($categorie);
    }

    /**
     * Atualiza uma categoria
     * @param int $id
     * @param arrray $categorie
     * @return json response
    */
    public function updateCategory(int $id, array $categorie)
    {
        $category = $this->categoryRepository->getCategorieById($id);

        if (!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        if ($categorie['name']) {
            $categorie['url'] = Str::kebab($categorie['name']);
        }
        $this->categoryRepository->updateCategorie($category, $categorie);
        return response()->json(['message' => 'Category Updated'], 200);
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