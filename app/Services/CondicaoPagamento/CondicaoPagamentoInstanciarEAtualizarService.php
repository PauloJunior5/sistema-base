<?php

namespace App\Services\CondicaoPagamento;

use Carbon\Carbon;

use App\Http\Requests\CondicaoPagamentoRequest;
use App\Models\CondicaoPagamento;
use App\Models\Parcela;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\ParcelaRepository;
use App\Services\FormaPagamento\FormaPagamentoBuscarEInstanciarService;
use App\Services\CondicaoPagamento\CondicaoPagamentoBuscarEInstanciarService;
use App\Services\Parcela\ParcelaGetDadosService;

class CondicaoPagamentoInstanciarEAtualizarService
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = New CondicaoPagamentoRepository;
        $this->parcelaRepository = New ParcelaRepository;
        $this->formaPagamentoBuscarEInstanciarService = New FormaPagamentoBuscarEInstanciarService;
        $this->condicaoPagamentoBuscarEInstanciarService = New CondicaoPagamentoBuscarEInstanciarService;
        $this->condicaoPagamentoGetDadosService = new CondicaoPagamentoGetDadosService;
        $this->parcelaGetDadosService = new ParcelaGetDadosService;
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
        $idCondicaoPagamento =  $this->condicaoPagamentoRepository->atualizar($dados);

        if ($idCondicaoPagamento) {

            $objectsArray = json_decode($request->parcelas);

            foreach ($objectsArray as $array) {

                $objeto = json_decode($array);

                $parcela = new Parcela;
                $parcela->setParcela($objeto->Parcela);
                $parcela->setDias($objeto->Dias);
                $parcela->setPorcentual($objeto->Porcentual);

                $formaPagamento = $this->formaPagamentoBuscarEInstanciarService->executar($objeto->Pagamento);
                $parcela->setFormaPagamento($formaPagamento);

                $condicaoPagamento = $this->condicaoPagamentoBuscarEInstanciarService->executar($idCondicaoPagamento);
                $parcela->setCondicaoPagamento($condicaoPagamento);

                $parcela->setCreated_at(Carbon::now()->toDateTimeString());

                $dados = $this->parcelaGetDadosService->executar($parcela);

                $result = $this->parcelaRepository->atualizar($dados);
            }
        }

        return $result;

    }
}