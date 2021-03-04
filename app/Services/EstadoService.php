<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\Estado;
use App\Http\Requests\EstadoRequest;
use App\Repositories\EstadoRepository;

class EstadoService
{
    public function __construct()
    {
        $this->estadoRepository = new EstadoRepository; //Bind com EstadoRepository
        $this->paisService = new PaisService; //Bind com PaisService
    }

    public function instanciarECriar(EstadoRequest $request)
    {
        $estado = new Estado;

        $estado->setEstado($request->get('estado'));
        $estado->setUF($request->get('uf'));
        $estado->setCreated_at(Carbon::now()->toDateTimeString());

        $pais = $this->paisService->findById($request->id_pais);
        $estado->setPais($pais);

        $dados = $this->getDados($pais);

        return $this->estadoRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(EstadoRequest $request)
    {
        $estado = new Estado;

        $estado->setId($request->id);
        $estado->setCreated_at($request->created_at);
        $estado->setUpdated_at(Carbon::now()->toDateTimeString());

        $estado->setEstado($request->estado);
        $estado->setUF($request->uf);

        $pais = $this->paisService->findById($request->id_pais);
        $estado->setPais($pais);

        $dados = $this->getDados($estado);

        return $this->estadoRepository->atualizarEstado($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function findById(int $id)
    {
        $result = $this->estadoRepository->findById($id);

        $estado = new Estado();

        $estado->setId($result->id);
        $estado->setCreated_at($result->created_at ?? null);
        $estado->setUpdated_at($result->updated_at ?? null);

        $estado->setEstado($result->estado);
        $estado->setUF($result->uf);

        $pais = $this->paisService->findById($result->id_pais);
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