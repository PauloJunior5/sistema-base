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

    public function listar()
    {
        return $this->entity->get();
    }

    public function findById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    public function adicionar(array $categoria)
    {
        return $this->entity->insert($categoria);
    }

    public function atualizar(array $category)
    {
        return $this->entity->where('id', $category['id'])->update($category);
    }

    public function remover(int $id)
    {
        return $this->entity->where('id', $id)->delete();
    }
}