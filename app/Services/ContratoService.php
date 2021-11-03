<?php

namespace App\Services;

use App\Http\Requests\ContratoRequest;
use App\Models\Contrato;
use App\Repositories\ContratoRepository;
use Illuminate\Support\Facades\DB;

class ContratoService
{
    public function __construct()
    {
        $this->contratoRepository = new ContratoRepository;
        $this->clienteService = new ClienteService;
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
            $clienteFisico = $this->clienteService->buscarEInstanciar($result->id_responsavel);
            $clienteJuridico = $this->clienteService->buscarEInstanciar($result->id_cliente);
            $contrato->setResponsavel($clienteFisico);
            $contrato->setCliente($clienteJuridico);
            $contratos->push($contrato);
        }

        return $contratos;
    }

    public function instanciarECriar(ContratoRequest $request)
    {
        $contrato = new Contrato;
        $contrato->setContrato($request->contrato);
        $clienteFisico = $this->clienteService->buscarEInstanciar($request->id_responsavel);
        $clienteJuridico = $this->clienteService->buscarEInstanciar($request->id_cliente);
        $contrato->setResponsavel($clienteFisico);
        $contrato->setCliente($clienteJuridico);
        $contrato->setCreated_at(now()->toDateTimeString());
        $contrato->setVigencia(now()->addYear()->toDateTimeString());
        $dados = $this->getDados($contrato);
        $contrato =  $this->contratoRepository->adicionar($dados);

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
        $clienteFisico = $this->clienteService->buscarEInstanciar($request->id_responsavel);
        $clienteJuridico = $this->clienteService->buscarEInstanciar($request->id_cliente);
        $contrato->setResponsavel($clienteFisico);
        $contrato->setCliente($clienteJuridico);
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
        $clienteFisico = $this->clienteService->buscarEInstanciar($result->id_responsavel);
        $clienteJuridico = $this->clienteService->buscarEInstanciar($result->id_cliente);
        $contrato->setResponsavel($clienteFisico);
        $contrato->setCliente($clienteJuridico);
        return $contrato;
    }

    private function getDados(Contrato $contrato)
    {
        $dados = [
            'id' => $contrato->getId(),
            'contrato' => $contrato->getContrato(),
            'id_responsavel' => $contrato->getResponsavel()->getId(),
            'id_cliente' => $contrato->getCliente()->getId(),
            'created_at' => $contrato->getCreated_at(),
            'updated_at' => $contrato->getUpdated_at(),
            'vigencia' => $contrato->getVigencia()
        ];
        return $dados;
    }
}