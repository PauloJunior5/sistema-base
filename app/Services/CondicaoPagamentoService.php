<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\CondicaoPagamento;
use App\Http\Requests\CondicaoPagamentoRequest;
use App\Models\Parcelas;
use App\Repositories\CondicaoPagamentoRepository;
use App\Repositories\ParcelaRepository;
use App\Services\FormaPagamento\BuscarEInstanciarService;

class CondicaoPagamentoService
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = New CondicaoPagamentoRepository; //Bind com CondicaoPagamentoRepository
        $this->parcelaRepository = New ParcelaRepository; //Bind com ParcelaRepository
        $this->buscarEInstanciarService = New BuscarEInstanciarService; //Bind com BuscarEInstanciarService
    }

    public function instanciarECriar(CondicaoPagamentoRequest $request)
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
            $result = 0;

            foreach ($objectsArray as $array) {

                $objeto = json_decode($array);

                $parcela = new Parcelas;
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

        return $condicaoPagamento;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(CondicaoPagamento $condicaoPagamento)
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

     /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDadosParcelas(parcelas $parcela)
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