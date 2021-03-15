<?php

namespace App\Services\FormaPagamento;

use Carbon\Carbon;

use App\Models\FormaPagamento;
use App\Http\Requests\FormaPagamentoRequest;
use App\Repositories\FormaPagamentoRepository;

class InstanciarEAtualizarService
{
    public function __construct()
    {
        $this->formaPagamentoRepository = New FormaPagamentoRepository; //Bind com FormaPagamentoRepository
        $this->getDadosService = New GetDadosService; //Bind com GetDadosService
    }

    public function executar(FormaPagamentoRequest $request)
    {
        $formaPagamento = new FormaPagamento;
        $formaPagamento->setId($request->id);
        $formaPagamento->setFormaPagamento($request->forma_pagamento);
        $formaPagamento->setCreated_at($request->created_at);
        $formaPagamento->setUpdated_at(Carbon::now()->toDateTimeString());
        $dados = $this->getDadosService->executar($formaPagamento);

        return $this->formaPagamentoRepository->atualizar($dados);
    }
}