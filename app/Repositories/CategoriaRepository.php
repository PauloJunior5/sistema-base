<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = DB::table('categorias');
    }

    /**
     * Get all Categories
     * @return array
     */
    public function getAllCategories()
    {
        return $this->entity->get();
    }

    /**
     * Seleciona a Categoria por ID
     * @param int $id
     * @return object
     */
    public function getCategorieById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Cria uma nova categoria
     * @param array $category
     * @return object
     */
    public function createCategorie(array $category)
    {
        return $this->entity->insert($category);
    }

    /**
     * Atualiza os dados da categoria
     * @param object $category
     * @param array $categorie
     * @return object
     */
    public function updateCategorie(array $category)
    {
        return $this->entity->where('id', $category['id'])->update($category);
    }

    /**
     * Deleta uma categoria
     * @param object $category
     */
    public function destroyCategorie(object $category)
    {
        return $category->delete();
    }
}