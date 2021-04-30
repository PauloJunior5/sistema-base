<?php

namespace App\Services;

use App\Models\Parcela;

class ParcelaService
{
     /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getDados(Parcela $parcela)
    {
        $dados = [
            'id' => $parcela->getId(),
            'parcela' => $parcela->getParcela(),
            'dias' => $parcela->getDias(),
            'porcentual' => $parcela->getPorcentual(),
            'condicao_pagamento' => $parcela->getCondicaoPagamento()->getId(),
            'forma_pagamento' => $parcela->getFormaPagamento()->getId(),
            'created_at' => $parcela->getCreated_at(),
            'updated_at' => $parcela->getUpdated_at()
        ];
        return $dados;
    }
}