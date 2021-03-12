<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\CondicaoPagamento;
use App\Http\Requests\CondicaoPagamentoRequest;
use App\Repositories\CondicaoPagamentoRepository;

class CondicaoPagamentoService
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = new CondicaoPagamentoRepository; //Bind com CondicaoPagamentoRepository
    }

    public function instanciarECriar(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = new CondicaoPagamento;

        $condicaoPagamento->setCondicaoPagamento($request->condicao_pagamento);
        $condicaoPagamento->setMulta($request->multa);
        $condicaoPagamento->setJuro($request->juro);
        $condicaoPagamento->setdesconto($request->desconto);
        $condicaoPagamento->setParcelas($request->parcelas);
        $condicaoPagamento->setCreated_at(Carbon::now()->toDateTimeString());

        $dados = $this->getDados($condicaoPagamento);
        return $this->condicaoPagamentoRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = new CondicaoPagamento;

        $condicaoPagamento->setId($request->id);
        $condicaoPagamento->setCreated_at($request->created_at);
        $condicaoPagamento->setUpdated_at(Carbon::now()->toDateTimeString());

        $condicaoPagamento->setCondicaoPagamento($request->condicao_pagamento);
        $condicaoPagamento->setMulta($request->multa);
        $condicaoPagamento->setJuro($request->juro);
        $condicaoPagamento->setdesconto($request->desconto);
        $condicaoPagamento->setParcelas($request->parcelas);

        $dados = $this->getDados($condicaoPagamento);

        return $this->condicaoPagamentoRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
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
        $condicaoPagamento->setParcelas($result->parcelas);

        return $condicaoPagamento;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(CondicaoPagamento $formaPagamento)
    {
        $dados = [
            'id' => $formaPagamento->getId(),

            'condicao_pagamento' => $formaPagamento->getCondicaoPagamento(),
            'multa' => $formaPagamento->getMulta(),
            'juro' => $formaPagamento->getJuro(),
            'desconto' => $formaPagamento->getDesconto(),
            'parcelas' => $formaPagamento->getParcelas(),

            'created_at' => $formaPagamento->getCreated_at(),
            'updated_at' => $formaPagamento->getUpdated_at()
        ];
        return $dados;
    }
}