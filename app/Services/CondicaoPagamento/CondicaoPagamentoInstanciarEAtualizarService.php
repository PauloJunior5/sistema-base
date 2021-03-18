<?php

namespace App\Services\CondicaoPagamento;

use Carbon\Carbon;

use App\Models\CondicaoPagamento;
use App\Http\Requests\CondicaoPagamentoRequest;
use App\Repositories\CondicaoPagamentoRepository;

class CondicaoPagamentoInstanciarEAtualizarService
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = New CondicaoPagamentoRepository;
        $this->condicaoPagamentoGetDadosService = New CondicaoPagamentoGetDadosService;
    }

    public function executar(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = new CondicaoPagamento;

        $condicaoPagamento->setId($request->id);
        $condicaoPagamento->setCreated_at($request->created_at);
        $condicaoPagamento->setUpdated_at(Carbon::now()->toDateTimeString());

        $condicaoPagamento->setCondicaoPagamento($request->condicao_pagamento);
        $condicaoPagamento->setMulta($request->multa);
        $condicaoPagamento->setJuro($request->juro);
        $condicaoPagamento->setdesconto($request->desconto);

        $dados = $this->condicaoPagamentoGetDadosService->executar($condicaoPagamento);

        return $this->condicaoPagamentoRepository->atualizar($dados);
    }
}