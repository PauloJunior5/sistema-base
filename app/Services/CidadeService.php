<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\Cidade;
use App\Http\Requests\CidadeRequest;
use App\Repositories\CidadeRepository;

class EstadoService
{
    public function __construct()
    {
        $this->cidadeRepository = new CidadeRepository; //Bind com CidadeRepository
        $this->estadoService = new EstadoService; //Bind com EstadoService
    }

    public function instanciarECriar(CidadeRequest $request)
    {
        $cidade = new Cidade;

        $cidade->setEstado($request->get('cidade'));
        $cidade->setDDD($request->get('ddd'));
        $cidade->setCreated_at(Carbon::now()->toDateTimeString());

        $estado = $this->estadoService->buscarEInstanciar($request->id_estado);
        $cidade->setEstado($estado);

        $dados = $this->getDados($cidade);

        return $this->cidadeRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(CidadeRequest $request)
    {
        $cidade = new Cidade;

        $cidade->setId($request->id);
        $cidade->setCreated_at($request->created_at);
        $cidade->setUpdated_at(Carbon::now()->toDateTimeString());

        $cidade->setCidade($request->cidade);
        $cidade->setDDD($request->ddd);

        $estado = $this->estadoService->buscarEInstanciar($request->id_estado);
        $cidade->setEstado($estado);

        $dados = $this->getDados($cidade);

        return $this->cidadeRepository->atualizarEstado($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->cidadeRepository->findById($id);

        $cidade = new Cidade();

        $cidade->setId($result->id);
        $cidade->setCreated_at($result->created_at ?? null);
        $cidade->setUpdated_at($result->updated_at ?? null);

        $cidade->setCidade($result->cidade);
        $cidade->setDDD($result->ddd);

        $estado = $this->estadoService->buscarEInstanciar($result->id_estado);
        $cidade->setEstado($estado);

        return $cidade;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(Cidade $cidade)
    {
        $dados = [
            'id' => $cidade->getId(),
            'cidade' => $cidade->getCidade(),
            'uf' => $cidade->getDDD(),
            'id_estado' => $cidade->getEstado()->getId(),
            'created_at' => $cidade->getCreated_at(),
            'updated_at' => $cidade->getUpdated_at()
        ];

        return $dados;
    }
}