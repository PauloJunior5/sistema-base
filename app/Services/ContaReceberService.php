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
    }

    public function instanciarECriar(ContaReceberRequest $request)
    {
    }

    public function instanciarEAtualizar(ContaReceberRequest $request)
    {
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(ContaReceber $pais)
    {
    }
}