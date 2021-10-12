<?php

namespace App\Services;

use App\Models\Categoria;
use App\Repositories\Contracts\CategoriaRepositoryInterface;

class CategoriaService
{
    protected $categoryRepository;

    public function __construct(CategoriaRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listar()
    {
        $results = $this->categoryRepository->listar();

        $categorias = collect();

        foreach ($results as $result) {
            $categoria = new Categoria();
            $categoria->setId($result->id);
            $categoria->setCreated_at($result->created_at ?? null); #Null coalescing operator
            $categoria->setUpdated_at($result->updated_at ?? null);
            $categoria->setCategoria($result->categoria);
            $categorias->push($categoria);
        }

         return $categorias;
    }

    public function findById(int $id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function adicionar(array $categoria)
    {
        $categoria['created_at'] = now()->toDateTimeString();
        return $this->categoryRepository->adicionar($categoria);
    }

    public function atualizar(array $dados)
    {
        $dados['updated_at'] = now()->toDateTimeString();
        $categoria = $this->categoryRepository->findById($dados['id']);
        return $this->categoryRepository->atualizar($dados);
    }

    public function remover(int $id)
    {
        $category = $this->categoryRepository->findById($id);
        return $this->categoryRepository->remover($id);
    }
}