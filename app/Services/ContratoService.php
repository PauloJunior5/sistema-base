<?php

namespace App\Services;

use App\Http\Requests\ContratoRequest;
use App\Models\Contrato;
use App\Repositories\ContratoRepository;

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
            $cliente = $this->clienteService->buscarEInstanciar($result->id_responsavel);
            $contrato->setResponsavel($cliente);
            $contratos->push($contrato);
        }

        return $contratos;
    }

    public function instanciarECriar(ContratoRequest $request)
    {
        $contrato = new Contrato;
        $contrato->setContrato($request->contrato);
        $cliente = $this->clienteService->buscarEInstanciar($request->id_responsavel);
        $contrato->setResponsavel($cliente);
        $contrato->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($contrato);
        return $this->contratoRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(ContratoRequest $request)
    {
        $contrato = new Contrato;
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
        $contrato = new Contrato;
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