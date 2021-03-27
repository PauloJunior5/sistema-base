<?php

namespace App\Services;

use App\Http\Requests\ContratoRequest;
use App\Models\Contrato;
use App\Repositories\ContratoRepository;

class ContratoService
{
    public function __construct()
    {
        $this->contratoRepository = New ContratoRepository;
        $this->clienteService = New ClienteService;
    }

    public function instanciarECriar(ContratoRequest $request)
    {
        $contrato = New Contrato;
        $contrato->setContrato($request->contrato);
        $cliente = $this->clienteService->buscarEInstanciar($request->id_responsavel);
        $contrato->setResponsavel($cliente);
        $contrato->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($contrato);
        return $this->contratoRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(ContratoRequest $request)
    {
        $contrato = New Contrato;
        $contrato->setId($request->id);
        $contrato->setCreated_at($request->created_at);
        $contrato->setUpdated_at(now()->toDateTimeString());
        $contrato->setContrato($request->contrato);
        $cliente = $this->clienteService->buscarEInstanciar($request->id_responsavel);
        $contrato->setResponsavel($cliente);
        $dados = $this->getDados($contrato);
        return $this->contratoRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->contratoRepository->findById($id);
        $contrato = New Contrato;
        $contrato->setId($result->id);
        $contrato->setCreated_at($result->created_at ?? null);
        $contrato->setUpdated_at($result->updated_at ?? null);
        $contrato->setContrato($result->contrato);
        $cliente = $this->clienteService->buscarEInstanciar($result->id_responsavel);
        $contrato->setResponsavel($cliente);
        return $contrato;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(Contrato $contrato)
    {
        $dados = [
            'id' => $contrato->getId(),
            'contrato' => $contrato->getContrato(),
            'id_responsavel' => $contrato->getResponsavel()->getId(),
            'created_at' => $contrato->getCreated_at(),
            'updated_at' => $contrato->getUpdated_at()
        ];
        return $dados;
    }
}