<?php

namespace App\Services\FormaPagamento;

use Carbon\Carbon;

use App\Models\FormaPagamento;
use App\Http\Requests\FormaPagamentoRequest;
use App\Repositories\FormaPagamentoRepository;

class InstanciarECriarService
{
    public function __construct()
    {
        $this->formaPagamentoRepository = New FormaPagamentoRepository; //Bind com FormaPagamentoRepository
        $this->getDadosService = new GetDadosService; //Bind com GetDadosService
    }

    public function executar(FormaPagamentoRequest $request)
    {
        $formaPagamento = new FormaPagamento;
        $formaPagamento->setFormaPagamento($request->forma_pagamento);
        $formaPagamento->setCreated_at(Carbon::now()->toDateTimeString());
        $dados = $this->getDadosService->executar($formaPagamento);

        return $this->formaPagamentoRepository->adicionar($dados);
    }
}