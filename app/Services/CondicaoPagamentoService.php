<?php

namespace App\Services;

use App\Models\CondicaoPagamento;
use App\Models\Parcela;
use App\Repositories\CondicaoPagamentoRepository;
use App\Http\Requests\CondicaoPagamentoRequest;
use App\Repositories\ParcelaRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CondicaoPagamentoService
{
    public function __construct()
    {
        $this->condicaoPagamentoRepository = New CondicaoPagamentoRepository;
        $this->parcelaRepository = New ParcelaRepository;
        $this->formaPagamentoService = New FormaPagamentoService;
        $this->parcelaService = New ParcelaService;
    }

    public function instanciaECriar(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = new CondicaoPagamento;
        $condicaoPagamento->setCondicaoPagamento($request->condicao_pagamento);
        $condicaoPagamento->setMulta($request->multa);
        $condicaoPagamento->setJuro($request->juro);
        $condicaoPagamento->setdesconto($request->desconto);
        $condicaoPagamento->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($condicaoPagamento);
        $result = null;
        DB::beginTransaction();
        try {
            $idCondicaoPagamento =  $this->condicaoPagamentoRepository->adicionar($dados);
            if ($idCondicaoPagamento) {
                $objectsArray = json_decode($request->parcelas);
                foreach ($objectsArray as $array) {
                    $objeto = json_decode($array);
                    $parcela = new Parcela;
                    $parcela->setParcela($objeto->Parcela);
                    $parcela->setDias($objeto->Dias);
                    $parcela->setPorcentual($objeto->Porcentual);
                    $formaPagamento = $this->formaPagamentoService->buscarEInstanciar($objeto->Pagamento);
                    $parcela->setFormaPagamento($formaPagamento);
                    $condicaoPagamento = $this->buscarEInstanciar($idCondicaoPagamento);
                    $parcela->setCondicaoPagamento($condicaoPagamento);
                    $parcela->setCreated_at(now()->toDateTimeString());
                    $dados = $this->parcelaService->getDados($parcela);
                    $result = $this->parcelaRepository->adicionar($dados);
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel criar condição de pagamento: ' . $th);
        }
        return $result;
    }

    public function instanciarEAtualizar(CondicaoPagamentoRequest $request)
    {
        $condicaoPagamento = new CondicaoPagamento;
        $condicaoPagamento->setId($request->id);
        $condicaoPagamento->setCreated_at($request->created_at);
        $condicaoPagamento->setUpdated_at(now()->toDateTimeString());
        $condicaoPagamento->setCondicaoPagamento($request->condicao_pagamento);
        $condicaoPagamento->setMulta($request->multa);
        $condicaoPagamento->setJuro($request->juro);
        $condicaoPagamento->setdesconto($request->desconto);
        $dados = $this->getDados($condicaoPagamento);
        $result = null;
        DB::beginTransaction();
        try {
            $condicaoPagamento =  $this->condicaoPagamentoRepository->atualizar($dados);
            if ($condicaoPagamento) {
                $objectsArray = json_decode($request->parcelas);
                foreach ($objectsArray as $objeto) {
                    $parcela = new Parcela;
                    $parcela->setParcela($objeto->parcela);
                    $parcela->setDias($objeto->dias);
                    $parcela->setPorcentual($objeto->porcentual);
                    $formaPagamento = $this->formaPagamentoService->buscarEInstanciar($objeto->forma_pagamento);
                    $parcela->setFormaPagamento($formaPagamento);
                    $condicaoPagamento = $this->buscarEInstanciar($request->id);
                    $parcela->setCondicaoPagamento($condicaoPagamento);
                    if (isset($objeto->id)) {
                        $parcela->setId($objeto->id);
                        $parcela->setUpdated_at(now()->toDateTimeString());
                        $parcela->setCreated_at($objeto->created_at);
                        $dados = $this->parcelaService->getDados($parcela);
                        $result = $this->parcelaRepository->atualizar($dados);
                    } else {
                        $parcela->setCreated_at(now()->toDateTimeString());
                        $dados = $this->parcelaService->getDados($parcela);
                        $result = $this->parcelaRepository->adicionar($dados);
                    }
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug('Warning - Não foi possivel editar condição de pagamento: ' . $th);
        }
        return $result;
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
    public function getDados(CondicaoPagamento $condicaoPagamento)
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