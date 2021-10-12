<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface
{
    public function getAllCategories();
    public function getCategorieById(int $id);
    public function createCategorie(array $categorie);
    public function updateCategorie(object $category, array $categorie);
    public function destroyCategorie(object $category);
}