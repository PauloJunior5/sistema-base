<?php

namespace App\Services\FormaPagamento;

use Carbon\Carbon;

use App\Models\FormaPagamento;
use App\Http\Requests\FormaPagamentoRequest;
use App\Repositories\FormaPagamentoRepository;

class BuscarEInstanciarService
{
    public function __construct()
    {
        $this->formaPagamentoRepository = new FormaPagamentoRepository; //Bind com FormaPagamentoRepository
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function executar(int $id)
    {
        $result = $this->formaPagamentoRepository->findById($id);
        $formaPagamento = new FormaPagamento;
        $formaPagamento->setId($result->id);
        $formaPagamento->setFormaPagamento($result->forma_pagamento);
        $formaPagamento->setCreated_at($result->created_at ?? null);
        $formaPagamento->setUpdated_at($result->updated_at ?? null);

        return $formaPagamento;
    }
}