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
        $this->condicaoPagamentoService = new CondicaoPagamentoService;
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
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $plano->setCondicaoPagamento($condicaoPagamento);
        $plano->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($plano);
        $idPlano = $this->planoRepository->adicionar($dados);

        $exames = json_decode($request->exames);

        if (!is_null($exames)) {
            foreach ($exames as $exame) {
                $dados = [
                    'id_plano' => $idPlano,
                    'id_exame' => $exame->id,
                    'created_at' => now()->toDateTimeString()
                ];

                if (!$this->planoRepository->findByIdExame($dados['id_exame'], $dados['id_plano'])) {
                    $this->planoRepository->adicionarExame($dados);
                }
            }
        }

        return $plano;
    }

    public function buscarEInstanciar(int $id)
    {
        $result = $this->planoRepository->findById($id);
        $plano = new Plano;
        $plano->setId($result->id);
        $plano->setPlano($result->plano);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($result->id_condicao_pagamento);
        $plano->setCondicaoPagamento($condicaoPagamento);
        $plano->setCreated_at($result->created_at ?? null);
        $plano->setUpdated_at($result->updated_at ?? null);
        return $plano;
    }

    public function instanciarEAtualizar(PlanoRequest $request)
    {
        $plano = new Plano;

        $plano->setId($request->id);
        $plano->setPlano($request->plano);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $plano->setCondicaoPagamento($condicaoPagamento);
        $plano->setCreated_at($request->created_at);
        $plano->setUpdated_at(now()->toDateTimeString());

        $dados = $this->getDados($plano);

        if (isset($request->examesExluidos)) {
            $examesExluidos = json_decode($request->examesExluidos);
            $dadosExamesExcluidos = [
                'examesExluidos' => array_column($examesExluidos, 'id'),
                'plano_id' => $request->id
            ];
            $this->planoRepository->removerExames($dadosExamesExcluidos);
        }

        $exames = json_decode($request->exames);
        if (!is_null($exames)) {
            foreach ($exames as $exame) {
                $dadosExamesNovos = [
                    'id_plano' => $request->id,
                    'id_exame' => $exame->id,
                    'created_at' => now()->toDateTimeString()
                ];

                if (!$this->planoRepository->findByIdExame($dadosExamesNovos['id_exame'], $dadosExamesNovos['id_plano'])) {
                    $this->planoRepository->adicionarExame($dadosExamesNovos);
                }
            }
        }

        $this->planoRepository->atualizar($dados);
    }

    public function getDados(Plano $plano)
    {
        $dados = [
            'id' => $plano->getId(),
            'plano' => $plano->getPlano(),
            'id_condicao_pagamento' => $plano->getCondicaoPagamento()->getId(),
            'created_at' => $plano->getCreated_at(),
            'updated_at' => $plano->getUpdated_at()
        ];

        return $dados;
    }
}