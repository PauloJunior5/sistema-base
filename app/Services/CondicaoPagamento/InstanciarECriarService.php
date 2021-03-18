<?php

namespace App\Services;

use App\Http\Requests\CondicaoPagamentoRequest;
use App\Models\CondicaoPagamento;
use App\Models\Parcela;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\ParcelaRepository;
use App\Services\FormaPagamento\BuscarEInstanciarService;
use Carbon\Carbon;

class InstanciarECriarService
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = New CondicaoPagamentoRepository; //Bind com CondicaoPagamentoRepository
        $this->parcelaRepository = New ParcelaRepository; //Bind com ParcelaRepository
        $this->buscarEInstanciarService = New BuscarEInstanciarService; //Bind com Forma de Pagamento - BuscarEInstanciarService
    }

    public function executar(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = new CondicaoPagamento;

        $condicaoPagamento->setCondicaoPagamento($request->condicao_pagamento);
        $condicaoPagamento->setMulta($request->multa);
        $condicaoPagamento->setJuro($request->juro);
        $condicaoPagamento->setdesconto($request->desconto);
        $condicaoPagamento->setCreated_at(Carbon::now()->toDateTimeString());

        $dados = $this->getDados($condicaoPagamento);
        $idCondicaoPagamento =  $this->condicaoPagamentoRepository->adicionar($dados);

        if ($idCondicaoPagamento) {

            $objectsArray = json_decode($request->parcelas);

            foreach ($objectsArray as $array) {

                $objeto = json_decode($array);

                $parcela = new Parcela;
                $parcela->setParcela($objeto->Parcela);
                $parcela->setDias($objeto->Dias);
                $parcela->setPorcentual($objeto->Porcentual);

                $formaPagamento = $this->buscarEInstanciarService->executar($objeto->Pagamento);
                $parcela->setFormaPagamento($formaPagamento);

                $condicaoPagamento = $this->buscarEInstanciar($idCondicaoPagamento);
                $parcela->setCondicaoPagamento($condicaoPagamento);

                $parcela->setCreated_at(Carbon::now()->toDateTimeString());

                $dados = $this->getDadosParcelas($parcela);

                $result = $this->parcelaRepository->adicionar($dados);
            }
        }

        return $result;
    }
}