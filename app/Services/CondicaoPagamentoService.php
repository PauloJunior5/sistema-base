<?php

namespace App\Services;

use Carbon\Carbon;

use App\Models\FormaPagamento;
use App\Http\Requests\FormaPagamentoRequest;
use App\Repositories\FormaPagamentoRepository;

class CondicaoPagamentoService
{
    public function __construct()
    {
    }

    public function instanciarECriar(FormaPagamentoRequest $request)
    {
    }

    public function instanciarEAtualizar(FormaPagamentoRequest $request)
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
    private function getDados(FormaPagamento $formaPagamento)
    {
    }
}