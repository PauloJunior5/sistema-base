<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface
{
    public function listar();
    public function findById(int $id);
    public function adicionar(array $categorie);
    public function atualizar(array $categorie);
    public function remover(int $id);
}