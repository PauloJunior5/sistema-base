<?php

namespace App\Services;

use App\Models\Estado;
use App\Http\Requests\EstadoRequest;
use App\Repositories\EstadoRepository;

class EstadoService
{
    public function __construct()
    {
        $this->estadoRepository = New EstadoRepository;
        $this->paisService = New PaisService;
    }

    public function instanciarECriar(EstadoRequest $request)
    {
        $estado = New Estado;
        $estado->setEstado($request->estado);
        $estado->setUF($request->uf);
        $estado->setCreated_at(now()->toDateTimeString());
        $pais = $this->paisService->buscarEInstanciar($request->id_pais);
        $estado->setPais($pais);
        $dados = $this->getDados($estado);
        return $this->estadoRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(EstadoRequest $request)
    {
        $estado = New Estado;
        $estado->setId($request->id);
        $estado->setCreated_at($request->created_at);
        $estado->setUpdated_at(now()->toDateTimeString());
        $estado->setEstado($request->estado);
        $estado->setUF($request->uf);
        $pais = $this->paisService->buscarEInstanciar($request->id_pais);
        $estado->setPais($pais);
        $dados = $this->getDados($estado);
        return $this->estadoRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->estadoRepository->findById($id);
        $estado = New Estado();
        $estado->setId($result->id);
        $estado->setCreated_at($result->created_at ?? null);
        $estado->setUpdated_at($result->updated_at ?? null);
        $estado->setEstado($result->estado);
        $estado->setUF($result->uf);
        $pais = $this->paisService->buscarEInstanciar($result->id_pais);
        $estado->setPais($pais);
        return $estado;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(Estado $estado)
    {
        $dados = [
            'id' => $estado->getId(),
            'estado' => $estado->getEstado(),
            'uf' => $estado->getUF(),
            'id_pais' => $estado->getPais()->getId(),
            'created_at' => $estado->getCreated_at(),
            'updated_at' => $estado->getUpdated_at()
        ];
        return $dados;
    }
}