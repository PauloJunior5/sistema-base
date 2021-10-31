<?php

namespace App\Services;

use App\Models\Plano;
use App\Http\Requests\PlanoRequest;
use App\Repositories\PlanoRepository;

class PlanoService
{
    public function __construct()
    {
        $this->planoRepository = new PlanoRepository;
    }

    public function instanciarTodos()
    {
        $results = $this->planoRepository->mostrarTodos();
        $planos = collect();

        foreach ($results as $result) {
            $plano = new Plano;
            $plano->setId($result->id);
            $plano->setCreated_at($result->created_at ?? null);
            $plano->setUpdated_at($result->updated_at ?? null);
            $plano->setPlano($result->plano);
            $planos->push($plano);
        }

        return $planos;
    }

    public function instanciarECriar(PlanoRequest $request)
    {
        $plano = new Plano;

        $plano->setPlano($request->plano);
        $plano->setCreated_at(now()->toDateTimeString());

        $dados = $this->getDados($plano);

        return $this->planoRepository->adicionar($dados);
    }

    public function buscarEInstanciar(int $id)
    {
        $result = $this->planoRepository->findById($id);
        $plano = new Plano;
        $plano->setId($result->id);
        $plano->setPlano($result->plano);
        $plano->setCreated_at($result->created_at ?? null);
        $plano->setUpdated_at($result->updated_at ?? null);
        return $plano;
    }

    public function instanciarEAtualizar(PlanoRequest $request)
    {
        $plano = new Plano;

        $plano->setId($request->id);
        $plano->setPlano($request->plano);
        $plano->setCreated_at($request->created_at);
        $plano->setUpdated_at(now()->toDateTimeString());

        $dados = $this->getDados($plano);

        $this->planoRepository->atualizar($dados);
    }

    public function getDados(Plano $plano)
    {
        $dados = [
            'id' => $plano->getId(),
            'plano' => $plano->getPlano(),
            'created_at' => $plano->getCreated_at(),
            'updated_at' => $plano->getUpdated_at()
        ];

        return $dados;
    }
}