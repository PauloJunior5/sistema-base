<?php

namespace App\Services;

use App\Models\ContaReceber;
use App\Http\Requests\ContaReceberRequest;
use App\Repositories\ContaReceberRepository;

class ContaReceberService
{
    public function __construct()
    {
        $this->contaReceberRepository = new ContaReceberRepository;
    }

    public function instanciarTodos()
    {
        $results = $this->contaReceberRepository->mostrarTodos();
        $paises = collect();

        foreach ($results as $result) {
            $pais = new ContaReceber();
            $pais->setId($result->id);
            $pais->setCreated_at($result->created_at ?? null);
            $pais->setUpdated_at($result->updated_at ?? null);
            $pais->setSigla($result->sigla);
            $pais->setContaReceber($result->pais);
            $paises->push($pais);
        }

        return $paises;
    }

    public function instanciarECriar(ContaReceberRequest $request)
    {
        $pais = new ContaReceber;
        $pais->setContaReceber($request->get('pais'));
        $pais->setSigla($request->get('sigla'));
        $pais->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($pais);
        return $this->contaReceberRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(ContaReceberRequest $request)
    {
        $pais = new ContaReceber;
        $pais->setId($request->id);
        $pais->setContaReceber($request->pais);
        $pais->setSigla($request->sigla);
        $pais->setCreated_at($request->created_at);
        $pais->setUpdated_at(now()->toDateTimeString());
        $dados = $this->getDados($pais);
        return $this->contaReceberRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->contaReceberRepository->findById($id);
        $pais = new ContaReceber();
        $pais->setId($result->id);
        $pais->setCreated_at($result->created_at ?? null);
        $pais->setUpdated_at($result->updated_at ?? null);
        $pais->setSigla($result->sigla);
        $pais->setContaReceber($result->pais);
        return $pais;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(ContaReceber $pais)
    {
        $dados = [
            'id' => $pais->getId(),
            'pais' => $pais->getContaReceber(),
            'sigla' => $pais->getSigla(),
            'created_at' => $pais->getCreated_at(),
            'updated_at' => $pais->getUpdated_at()
        ];
        return $dados;
    }
}