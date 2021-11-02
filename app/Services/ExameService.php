<?php

namespace App\Services;

use App\Models\Exame;
use App\Models\Categoria;

use App\Http\Requests\ExameRequest;

use App\Repositories\ExameRepository;

use App\Services\CategoriaService;

class ExameService
{
    public function __construct()
    {
        $this->exameRepository = new ExameRepository;
        $this->categoriaService = new CategoriaService;
    }

    public function instanciarTodos()
    {
        $results = $this->exameRepository->mostrarTodos();
        $exames = collect();

        foreach ($results as $result) {
            $exame = new Exame;
            $exame->setId($result->id);
            $exame->setExame($result->exame);
            $exame->setValor($result->valor);
            $categoria = $this->categoriaService->buscarEInstanciar($result->id_categoria);
            $exame->setCategoria($categoria);
            $exame->setCreated_at($result->created_at ?? null);
            $exame->setUpdated_at($result->updated_at ?? null);
            $exames->push($exame);
        }

        return $exames;
    }

    public function instanciarECriar(ExameRequest $request)
    {
        $exame = new Exame;
        $exame->setExame($request->exame);
        $exame->setValor($request->valor);
        $categoria = $this->categoriaService->buscarEInstanciar($request->id_categoria);
        $exame->setCategoria($categoria);
        $exame->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($exame);
        return $this->exameRepository->adicionar($dados);
    }

    public function buscarEInstanciar(int $id)
    {
        $result = $this->exameRepository->findById($id);
        $exame = new Exame;
        $exame->setId($result->id);
        $exame->setExame($result->exame);
        $exame->setValor($result->valor);
        $categoria = $this->categoriaService->buscarEInstanciar($result->id_categoria);
        $exame->setCategoria($categoria);
        $exame->setCreated_at($result->created_at ?? null);
        $exame->setUpdated_at($result->updated_at ?? null);
        return $exame;
    }

    public function instanciarEAtualizar(ExameRequest $request)
    {
        $exame = new Exame;
        $exame->setId($request->id);
        $exame->setExame($request->exame);
        $exame->setValor($request->valor);
        $categoria = $this->categoriaService->buscarEInstanciar($request->id_categoria);
        $exame->setCategoria($categoria);
        $exame->setCreated_at($request->created_at);
        $exame->setUpdated_at(now()->toDateTimeString());
        $dados = $this->getDados($exame);
        return $this->exameRepository->atualizar($dados);
    }

    public function getDados(Exame $exame)
    {
        $dados = [
            'id' => $exame->getId(),
            'exame' => $exame->getExame(),
            'valor' => $exame->getValor(),
            'id_categoria' => $exame->getCategoria()->getId(),
            'created_at' => $exame->getCreated_at(),
            'updated_at' => $exame->getUpdated_at()
        ];
        return $dados;
    }
}