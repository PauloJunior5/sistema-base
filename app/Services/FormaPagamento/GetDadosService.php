<?php

namespace App\Services\FormaPagamento;

use App\Models\FormaPagamento;

class GetDadosService
{
    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function executar(FormaPagamento $formaPagamento)
    {
        $dados = [
            'id' => $formaPagamento->getId(),
            'forma_pagamento' => $formaPagamento->getFormaPagamento(),
            'created_at' => $formaPagamento->getCreated_at(),
            'updated_at' => $formaPagamento->getUpdated_at()
        ];

        return $dados;
    }
}