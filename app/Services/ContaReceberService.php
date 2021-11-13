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
        $dados = [
            'id' => $event->getId(),
            'contrato' => $event->getContrato(),
            'valor' => $event->getValor(),
            'id_responsavel' => $event->getResponsavel()->getId(),
            'id_cliente' => $event->getCliente()->getId(),
            'id_condicao_pagamento' => $event->getCondicaoPagamento()->getId(),
            'id_plano' => $event->getPlano()->getId(),
            'created_at' => $event->getCreated_at(),
            'updated_at' => $event->getUpdated_at(),
            'vigencia' => $event->getVigencia()
        ];

        // $dados = [];

        return $dados;
    }

    public function createByEvent(EventCreatedContasReceber $event)
    {
        $contaReceber = new ContaReceber();
        $contrato = $event->contrato;
        $parcelas = $this->parcelaRepository->findById($contrato->getCondicaoPagamento()->getId());
        $parcelas = json_decode($parcelas);

        foreach ($parcelas as $parcela) {
            Log::debug(json_encode($parcela));
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

            $contaReceber->setCreated_at($result->created_at ?? null);
            $contaReceber->setUpdated_at($result->updated_at ?? null);
        }
        

        $dados = $this->getDados($contaReceber);
        $this->contaReceberRepository->adicionar($dados);
    }
}