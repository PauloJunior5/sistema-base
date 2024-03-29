<?php

namespace App\Services;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use App\Repositories\CategoriaRepository;

class CategoriaService
{
    public function __construct()
    {
        $this->categoriaRepository = new CategoriaRepository;
    }

    public function instanciarTodos()
    {
        $results = $this->categoriaRepository->mostrarTodos();
        $categorias = collect();

        foreach ($results as $result) {
            $categoria = new Categoria;
            $categoria->setId($result->id);
            $categoria->setCreated_at($result->created_at ?? null);
            $categoria->setUpdated_at($result->updated_at ?? null);
            $categoria->setCategoria($result->categoria);
            $categorias->push($categoria);
        }

        return $categorias;
    }

    public function instanciarECriar(CategoriaRequest $request)
    {
        $categoria = new Categoria;

        $categoria->setCategoria($request->categoria);
        $categoria->setCreated_at(now()->toDateTimeString());

        $dados = $this->getDados($categoria);

        return $this->categoriaRepository->adicionar($dados);
    }

    public function buscarEInstanciar(int $id)
    {
        $result = $this->categoriaRepository->findById($id);
        $categoria = new Categoria;
        $categoria->setId($result->id);
        $categoria->setCategoria($result->categoria);
        $categoria->setCreated_at($result->created_at ?? null);
        $categoria->setUpdated_at($result->updated_at ?? null);
        return $categoria;
    }

    public function instanciarEAtualizar(CategoriaRequest $request)
    {
        $categoria = new Categoria;

        $categoria->setId($request->id);
        $categoria->setCategoria($request->categoria);
        $categoria->setCreated_at($request->created_at);
        $categoria->setUpdated_at(now()->toDateTimeString());

        $dados = $this->getDados($categoria);

        $this->categoriaRepository->atualizar($dados);
    }

    public function getDados(Categoria $categoria)
    {
        $dados = [
            'id' => $categoria->getId(),
            'categoria' => $categoria->getCategoria(),
            'created_at' => $categoria->getCreated_at(),
            'updated_at' => $categoria->getUpdated_at()
        ];

        return $dados;
    }
}