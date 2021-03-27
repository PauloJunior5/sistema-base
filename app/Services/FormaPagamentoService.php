<?php

namespace App\Services;

use App\Http\Requests\FormaPagamentoRequest;
use App\Models\FormaPagamento;
use App\Repositories\FormaPagamentoRepository;

class FormaPagamentoService
{
    public function __construct()
    {
        $this->formaPagamentoRepository = New FormaPagamentoRepository;
    }

    public function instanciarECriar(FormaPagamentoRequest $request)
    {
        $formaPagamento = new FormaPagamento;
        $formaPagamento->setFormaPagamento($request->forma_pagamento);
        $formaPagamento->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($formaPagamento);
        return $this->formaPagamentoRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(FormaPagamentoRequest $request)
    {
        $formaPagamento = new FormaPagamento;
        $formaPagamento->setId($request->id);
        $formaPagamento->setFormaPagamento($request->forma_pagamento);
        $formaPagamento->setCreated_at($request->created_at);
        $formaPagamento->setUpdated_at(now()->toDateTimeString());
        $dados = $this->getDados($formaPagamento);
        return $this->formaPagamentoRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->formaPagamentoRepository->findById($id);
        $formaPagamento = new FormaPagamento;
        $formaPagamento->setId($result->id);
        $formaPagamento->setFormaPagamento($result->forma_pagamento);
        $formaPagamento->setCreated_at($result->created_at ?? null);
        $formaPagamento->setUpdated_at($result->updated_at ?? null);
        return $formaPagamento;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getDados(FormaPagamento $formaPagamento)
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