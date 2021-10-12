<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface
{
    public function mostrarTodos();
    public function findById(int $id);
    public function adicionar(array $categorie);
    public function atualizar(array $categorie);
    public function remover(int $id);
}