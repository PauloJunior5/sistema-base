<?php

namespace App\Services;

use App\Models\Pais;
use App\Http\Requests\PaisRequest;
use App\Repositories\PaisRepository;

class PaisService
{
    public function __construct()
    {
        $this->paisRepository = new PaisRepository;
    }

    public function InstanciarTodos()
    {
        $results = $this->paisRepository->mostrarTodos();
        $paises = collect();

        foreach ($results as $result) {
            $pais = new Pais();
            $pais->setId($result->id);
            $pais->setCreated_at($result->created_at ?? null);
            $pais->setUpdated_at($result->updated_at ?? null);
            $pais->setSigla($result->sigla);
            $pais->setPais($result->pais);
            $paises->push($pais);
        }

        return $paises;
    }

    public function instanciarECriar(PaisRequest $request)
    {
        $pais = new Pais;
        $pais->setPais($request->get('pais'));
        $pais->setSigla($request->get('sigla'));
        $pais->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($pais);
        return $this->paisRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(PaisRequest $request)
    {
        $pais = new Pais;
        $pais->setId($request->id);
        $pais->setPais($request->pais);
        $pais->setSigla($request->sigla);
        $pais->setCreated_at($request->created_at);
        $pais->setUpdated_at(now()->toDateTimeString());
        $dados = $this->getDados($pais);
        return $this->paisRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->paisRepository->findById($id);
        $pais = new Pais();
        $pais->setId($result->id);
        $pais->setCreated_at($result->created_at ?? null);
        $pais->setUpdated_at($result->updated_at ?? null);
        $pais->setSigla($result->sigla);
        $pais->setPais($result->pais);
        return $pais;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(Pais $pais)
    {
        $dados = [
            'id' => $pais->getId(),
            'pais' => $pais->getPais(),
            'sigla' => $pais->getSigla(),
            'created_at' => $pais->getCreated_at(),
            'updated_at' => $pais->getUpdated_at()
        ];
        return $dados;
    }
}