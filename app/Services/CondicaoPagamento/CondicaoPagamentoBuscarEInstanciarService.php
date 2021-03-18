<?php

namespace App\Services\CondicaoPagamento;

use App\Models\CondicaoPagamento;
use App\Repositories\CondicaoPagamentoRepository;

class CondicaoPagamentoBuscarEInstanciarService
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = New CondicaoPagamentoRepository;
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function executar(int $id)
    {
        $result = $this->condicaoPagamentoRepository->findById($id);
        $condicaoPagamento = new CondicaoPagamento;

        $condicaoPagamento->setId($result->id);
        $condicaoPagamento->setCreated_at($result->created_at ?? null);
        $condicaoPagamento->setUpdated_at($result->updated_at ?? null);

        $condicaoPagamento->setCondicaoPagamento($result->condicao_pagamento);
        $condicaoPagamento->setMulta($result->multa);
        $condicaoPagamento->setJuro($result->juro);
        $condicaoPagamento->setdesconto($result->desconto);

        return $condicaoPagamento;
    }
}