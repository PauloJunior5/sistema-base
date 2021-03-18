<?php

namespace App\Services\CondicaoPagamento;

use App\Models\CondicaoPagamento;

class GetDadosService
{
    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function executar(CondicaoPagamento $condicaoPagamento)
    {
        $dados = [
            'id' => $condicaoPagamento->getId(),

            'condicao_pagamento' => $condicaoPagamento->getCondicaoPagamento(),
            'multa' => $condicaoPagamento->getMulta(),
            'juro' => $condicaoPagamento->getJuro(),
            'desconto' => $condicaoPagamento->getDesconto(),
            'created_at' => $condicaoPagamento->getCreated_at(),
            'updated_at' => $condicaoPagamento->getUpdated_at()
        ];
        return $dados;
    }
}