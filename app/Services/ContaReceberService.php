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
use DateTime;
use Illuminate\Http\Request;

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
            $contaReceber->setDias($result->dias);
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
            $responsavel = $this->clienteService->buscarEInstanciar($result->id_responsavel);
            $contaReceber->setResponsavel($responsavel);
            $formaPagamento = $this->formaPagamentoService->buscarEInstanciar($result->id_forma_pagamento);
            $contaReceber->setFormaPagamento($formaPagamento);

            $contaReceber->setCreated_at($result->created_at ?? null);
            $contaReceber->setUpdated_at($result->updated_at ?? null);

            $contasReceber->push($contaReceber);
        }

        return $contasReceber;
    }

    public function instanciarECriar(Request $request)
    {
    }

    public function instanciarEAtualizar($id, Request $request)
    {
        $result = $this->contaReceberRepository->findById($id);
        $contaReceber = new ContaReceber();
        $contaReceber->setId($result->id);
        $contaReceber->setStatus($request->status);
        $contaReceber->setMulta($request->multa);
        $contaReceber->setJuro($request->juro);
        $contaReceber->setDesconto($request->desconto);
        $contaReceber->setUpdated_at(now()->toDateTimeString());

        $dados = [
            'id' => $contaReceber->getId(),
            'status' => $contaReceber->getStatus(),
            'juro' => $contaReceber->getJuro(),
            'desconto' => $contaReceber->getDesconto(),
            'multa' => $contaReceber->getMulta(),
            'updated_at' => $contaReceber->getUpdated_at()
        ];

        $contaReceber = $this->contaReceberRepository->atualizar($dados);
        return $contaReceber;
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar($id)
    {
        $result = $this->contaReceberRepository->findById($id);
        $contaReceber = new ContaReceber;
        $contaReceber->setId($result->id);
        $contaReceber->setParcela($result->parcela);
        $contaReceber->setDias($result->dias);
        $contaReceber->setValor(0);
        $contaReceber->setMulta(0);
        $contaReceber->setJuro(0);
        $contaReceber->setDesconto(0);
        $contaReceber->setStatus($result->status);

        $contaReceber->setDataEmissao($result->data_emissao);
        $contaReceber->setDataVencimento($result->data_vencimento);

        $vencido = now()->gt($result->data_vencimento);
        if ($vencido && ($result->status == 0)) {
            // multa
            $multa = $result->multa / 100;
            $multaTotal = $result->valor * $multa;
            $contaReceber->setMulta($multaTotal + $result->valor);

            // juros
            $entrada = now();
            $saida = new DateTime($result->data_vencimento);
            $intervalo = $saida->diff($entrada);

            $juro = $result->juro / 30;
            $juroDia = round( $juro * $intervalo->d , 2);
            $juroTotal = ($result->valor * ($juroDia / 100));
            $contaReceber->setJuro($result->valor + $juroTotal);

            // valor total
            $valorTotal = $result->valor + $multaTotal + $juroTotal;
            $contaReceber->setValor($valorTotal);
        }

        if ($vencido && ($result->status == 1)) {
            $contaReceber->setValor($result->valor);
            $contaReceber->setMulta($result->multa);
            $contaReceber->setJuro($result->juro);
        }

        $antecipado = now()->lt($result->data_vencimento);
        if ($antecipado && ($result->status == 0)) {
            // desconto
            $desconto = $result->valor * ((100 - $result->desconto) / 100);
            $contaReceber->setDesconto($result->valor * ($result->desconto / 100));
            $contaReceber->setValor($desconto);
        }

        if ($antecipado && ($result->status == 1)) {
            $contaReceber->setDesconto($result->desconto);
        }

        $contrato = $this->contratoService->buscarEInstanciar($result->id_contrato);
        $contaReceber->setContrato($contrato);

        $cliente = $this->clienteService->buscarEInstanciar($result->id_cliente);
        $contaReceber->setCliente($cliente);
        $responsavel = $this->clienteService->buscarEInstanciar($result->id_responsavel);
        $contaReceber->setResponsavel($responsavel);

        $formaPagamento = $this->formaPagamentoService->buscarEInstanciar($result->id_forma_pagamento);
        $contaReceber->setFormaPagamento($formaPagamento);

        $contaReceber->setCreated_at($result->created_at ?? null);
        $contaReceber->setUpdated_at($result->updated_at ?? null);

        return $contaReceber;
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
            'dias' => $contaReceber->getDias(),
            'valor' => $contaReceber->getValor(),
            'multa' => $contaReceber->getMulta(),
            'juro' => $contaReceber->getJuro(),
            'desconto' => $contaReceber->getDesconto(),
            'status' => $contaReceber->getStatus(),
            'id_contrato' => $contaReceber->getContrato()->getId(),
            'id_cliente' => $contaReceber->getCliente()->getId(),
            'id_responsavel' => $contaReceber->getResponsavel()->getId(),
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
            $contaReceber->setDias($parcela->dias);

            $valorParcela = ($parcela->porcentual / 100) * $contrato->getValor();
            $contaReceber->setValor($valorParcela);

            $contaReceber->setMulta($contrato->getCondicaoPagamento()->getMulta());
            $contaReceber->setJuro((float) $contrato->getCondicaoPagamento()->getJuro());
            $contaReceber->setDesconto((float) $contrato->getCondicaoPagamento()->getDesconto());
            $contaReceber->setStatus(0);

            $contaReceber->setDataEmissao($contrato->getCreated_at());

            $vencimento = Carbon::parse($contrato->getCreated_at())->addDays($parcela->dias);
            $contaReceber->setDataVencimento($vencimento);

            $contrato = $this->contratoService->buscarEInstanciar($contrato->getId());
            $contaReceber->setContrato($contrato);
            $cliente = $this->clienteService->buscarEInstanciar($contrato->getCliente()->getId());
            $contaReceber->setCliente($cliente);
            $responsavel = $this->clienteService->buscarEInstanciar($contrato->getResponsavel()->getId());
            $contaReceber->setResponsavel($responsavel);
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