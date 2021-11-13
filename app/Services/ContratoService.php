<?php

namespace App\Services;

use App\Events\EventCreatedContasReceber;
use App\Models\Contrato;
use App\Http\Requests\ContratoRequest;

use App\Repositories\ContratoRepository;
use App\Repositories\ContaReceberRepository;

use App\Services\PlanoService;
use Illuminate\Support\Facades\Log;

class ContratoService
{
    public function __construct()
    {
        $this->contratoRepository = new ContratoRepository;
        $this->contaReceberRepository = new ContaReceberRepository;

        $this->clienteService = new ClienteService;
        $this->condicaoPagamentoService = new CondicaoPagamentoService;
        $this->planoService = new PlanoService;
    }

    public function instanciarTodos()
    {
        $results = $this->contratoRepository->mostrarTodos();
        $contratos = collect();

        foreach ($results as $result) {
            $contrato = new Contrato;
            $contrato->setId($result->id);
            $contrato->setCreated_at($result->created_at ?? null);
            $contrato->setUpdated_at($result->updated_at ?? null);
            $contrato->setContrato($result->contrato);
            $contrato->setValor($result->valor);
            $clienteFisico = $this->clienteService->buscarEInstanciar($result->id_responsavel);
            $clienteJuridico = $this->clienteService->buscarEInstanciar($result->id_cliente);
            $plano = $this->planoService->buscarEInstanciar($result->id_plano);
            $contrato->setResponsavel($clienteFisico);
            $contrato->setCliente($clienteJuridico);
            $contrato->setPlano($plano);
            $contratos->push($contrato);
        }

        return $contratos;
    }

    public function instanciarECriar(ContratoRequest $request)
    {
        $contrato = new Contrato;
        $contrato->setContrato($request->contrato);
        $contrato->setValor($request->valor);
        $clienteFisico = $this->clienteService->buscarEInstanciar($request->id_responsavel);
        $clienteJuridico = $this->clienteService->buscarEInstanciar($request->id_cliente);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $plano = $this->planoService->buscarEInstanciar($request->id_plano);
        $contrato->setResponsavel($clienteFisico);
        $contrato->setCliente($clienteJuridico);
        $contrato->setCondicaoPagamento($condicaoPagamento);
        $contrato->setPlano($plano);
        $contrato->setCreated_at(now()->toDateTimeString());
        $contrato->setVigencia(now()->addYear()->toDateTimeString());
        $dados = $this->getDados($contrato);
        $contrato =  $this->contratoRepository->adicionar($dados);

        $contratoObj = $this->buscarEInstanciar($contrato);
        event(new EventCreatedContasReceber($contratoObj));

        $pacientes = json_decode($request->pacientes);

        if (!is_null($pacientes)) {
            foreach ($pacientes as $paciente) {
                $dados = [
                    'id_contrato' => $contrato,
                    'id_paciente' => $paciente->id,
                    'created_at' => now()->toDateTimeString()
                ];

                if (!$this->contratoRepository->findByIdPaciente($dados['id_contrato'], $dados['id_paciente'])) {
                    $this->contratoRepository->adicionarPaciente($dados);
                }
            }
        }

        return $contrato;
    }

    public function instanciarEAtualizar(ContratoRequest $request)
    {
        $contrato = new Contrato;
        $contrato->setId($request->id);
        $contrato->setCreated_at($request->created_at);
        $contrato->setUpdated_at(now()->toDateTimeString());
        $contrato->setVigencia($request->vigencia);
        $contrato->setContrato($request->contrato);
        $contrato->setValor($request->valor);
        $clienteFisico = $this->clienteService->buscarEInstanciar($request->id_responsavel);
        $clienteJuridico = $this->clienteService->buscarEInstanciar($request->id_cliente);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $plano = $this->planoService->buscarEInstanciar($request->id_plano);
        $contrato->setResponsavel($clienteFisico);
        $contrato->setCliente($clienteJuridico);
        $contrato->setCondicaoPagamento($condicaoPagamento);
        $contrato->setPlano($plano);
        $dados = $this->getDados($contrato);
        $contrato = $this->contratoRepository->atualizar($dados);

        if (isset($request->pacientesExluidos)) {
            $pacientesExluidos = json_decode($request->pacientesExluidos);
            $dados = [
                'pacientesExluidos' => array_column($pacientesExluidos, 'id'),
                'contrato_id' => $request->id
            ];
            $this->contratoRepository->removerPacientes($dados);
        }

        $pacientes = json_decode($request->pacientes);
        if (!is_null($pacientes)) {
            foreach ($pacientes as $paciente) {
                $dados = [
                    'id_contrato' => $request->id,
                    'id_paciente' => $paciente->id,
                    'created_at' => now()->toDateTimeString()
                ];

                if (!$this->contratoRepository->findByIdPaciente($dados['id_contrato'], $dados['id_paciente'])) {
                    $this->contratoRepository->adicionarPaciente($dados);
                }
            }
        }

        return $contrato;
    }

    public function buscarEInstanciar(int $id)
    {
        $result = $this->contratoRepository->findById($id);
        $contrato = new Contrato;
        $contrato->setId($result->id);
        $contrato->setCreated_at($result->created_at ?? null);
        $contrato->setUpdated_at($result->updated_at ?? null);
        $contrato->setVigencia($result->vigencia);
        $contrato->setContrato($result->contrato);
        $contrato->setValor($result->valor);
        $clienteFisico = $this->clienteService->buscarEInstanciar($result->id_responsavel);
        $clienteJuridico = $this->clienteService->buscarEInstanciar($result->id_cliente);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($result->id_condicao_pagamento);
        $plano = $this->planoService->buscarEInstanciar($result->id_plano);
        $contrato->setResponsavel($clienteFisico);
        $contrato->setCliente($clienteJuridico);
        $contrato->setCondicaoPagamento($condicaoPagamento);
        $contrato->setPlano($plano);
        return $contrato;
    }

    private function getDados(Contrato $contrato)
    {
        $dados = [
            'id' => $contrato->getId(),
            'contrato' => $contrato->getContrato(),
            'valor' => $contrato->getValor(),
            'id_responsavel' => $contrato->getResponsavel()->getId(),
            'id_cliente' => $contrato->getCliente()->getId(),
            'id_condicao_pagamento' => $contrato->getCondicaoPagamento()->getId(),
            'id_plano' => $contrato->getPlano()->getId(),
            'created_at' => $contrato->getCreated_at(),
            'updated_at' => $contrato->getUpdated_at(),
            'vigencia' => $contrato->getVigencia()
        ];
        return $dados;
    }

    public function delete($id)
    {
        $contasReceber = $this->contaReceberRepository->mostrarTodosContrato($id);

        foreach ($contasReceber as $key => $value) {
            if ($value->status == 0) {
                Log::debug('Warning - Não foi possivel excluir contas a receber - Verifique as pendências');
                return false;
            }
        }

        $this->contaReceberRepository->remover($id);
        $contrato = $this->contratoRepository->remover($id);
        return $contrato;
    }
    
}