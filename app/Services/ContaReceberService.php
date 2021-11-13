<?php

namespace App\Services;

use App\Events\EventCreatedContasReceber;

use App\Models\ContaReceber;

use App\Http\Requests\ContaReceberRequest;
use App\Repositories\ContaReceberRepository;
use App\Repositories\ParcelaRepository;

use App\Services\ContratoService;
use App\Services\ClienteService;
use App\Services\FormaPagamentoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ContaReceberService
{
    public function __construct()
    {
        $this->contaReceberRepository = new ContaReceberRepository;
        $this->parcelaRepository = new ParcelaRepository;

        $this->contratoService = new ContratoService;
        $this->clienteService = new ClienteService;
        $this->formaPagamentoService = new FormaPagamentoService;
        
    }

    public function instanciarTodos()
    {
        $results = $this->contaReceberRepository->mostrarTodos();
        $contasReceber = collect();

        foreach ($results as $result) {
            $contaReceber = new ContaReceber();
            
            $contaReceber->setId($result->id);
            
            $contaReceber->setParcela($result->parcela);
            $contaReceber->setValor($result->valor);
            $contaReceber->setMulta($result->multa);
            $contaReceber->setJuro($result->juro);
            $contaReceber->setDesconto($result->desconto);
            $contaReceber->setStatus($result->status);

            $contaReceber->setDataEmissao($result->data_emissao);
            $contaReceber->setDataVencimento($result->data_vencimento);

            $contrato = $this->contratoService->buscarEInstanciar($result->id_contrato);
            $contaReceber->setContrato($contrato);
            $cliente = $this->clienteService->buscarEInstanciar($result->id_cliente);
            $contaReceber->setCliente($cliente);
            $formaPagamento = $this->formaPagamentoService->buscarEInstanciar($result->id_forma_pagamento);
            $contaReceber->setFormaPagamento($formaPagamento);

            $contaReceber->setCreated_at($result->created_at ?? null);
            $contaReceber->setUpdated_at($result->updated_at ?? null);

            $contasReceber->push($contaReceber);
        }

        return $contasReceber;
    }

    public function instanciarECriar(ContaReceberRequest $request)
    {
    }

    public function instanciarEAtualizar(ContaReceberRequest $request)
    {
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(ContaReceber $contaReceber)
    {
        $dado = [
            'id' => $contaReceber->getId(),
            'parcela' => $contaReceber->getParcela(),
            'valor' => $contaReceber->getValor(),
            'multa' => $contaReceber->getMulta(),
            'juro' => $contaReceber->getJuro(),
            'desconto' => $contaReceber->getDesconto(),
            'status' => $contaReceber->getStatus(),
            'id_contrato' => $contaReceber->getContrato()->getId(),
            'id_cliente' => $contaReceber->getCliente()->getId(),
            'id_forma_pagamento' => $contaReceber->getFormaPagamento()->getId(),

            'data_emissao' => $contaReceber->getDataEmissao(),
            'data_vencimento' => $contaReceber->getDataVencimento(),

            'created_at' => $contaReceber->getCreated_at(),
            'updated_at' => $contaReceber->getUpdated_at()
        ];

        return $dado;
    }

    public function createByEvent(EventCreatedContasReceber $event)
    {
        $contasReceber = collect();
        $contrato = $event->contrato;
        $parcelas = $this->parcelaRepository->findById($contrato->getCondicaoPagamento()->getId());
        $parcelas = json_decode($parcelas);
        $dados = [];

        foreach ($parcelas as $parcela) {
            $contaReceber = new ContaReceber();
            $contaReceber->setParcela($parcela->parcela);
            $contaReceber->setValor((float) 1);
            $contaReceber->setMulta($contrato->getCondicaoPagamento()->getMulta());
            $contaReceber->setJuro((float) $contrato->getCondicaoPagamento()->getJuro());
            $contaReceber->setDesconto((float) $contrato->getCondicaoPagamento()->getDesconto());
            $contaReceber->setStatus(0);

            $contaReceber->setDataEmissao($contrato->getCondicaoPagamento()->getCreated_at());

            $vencimento = Carbon::parse($contrato->getCondicaoPagamento()->getCreated_at())->addDays($parcela->dias);
            $contaReceber->setDataVencimento($vencimento);

            $contrato = $this->contratoService->buscarEInstanciar($contrato->getId());
            $contaReceber->setContrato($contrato);
            $cliente = $this->clienteService->buscarEInstanciar($contrato->getCliente()->getId());
            $contaReceber->setCliente($cliente);
            $formaPagamento = $this->formaPagamentoService->buscarEInstanciar($parcela->id_forma_pagamento);
            $contaReceber->setFormaPagamento($formaPagamento);

            $contaReceber->setCreated_at(now()->toDateTimeString());

            $contasReceber->push($contaReceber);
            $dado = $this->getDados($contaReceber);
            array_push($dados, $dado);
        }
        
        $this->contaReceberRepository->adicionar($dados);
    }
}