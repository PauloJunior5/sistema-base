<?php

namespace App\Services;

use App\Http\Requests\ExameRequest;
use App\Models\Exame;
use App\Repositories\ExameRepository;

class ExameService
{
    public function __construct()
    {
        $this->exameRepository = new ExameRepository;
    }

    public function instanciarECriar(ExameRequest $request)
    {
        $exame = new Exame;
        $exame->setExame($request->exame);
        $exame->setValor($request->valor);
        $exame->setPlano($request->plano);
        $exame->setCategoria($request->categoria);
        $exame->setCreated_at(now()->toDateString());
        $dados = $this->getDados($exame);
        return $this->exameRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(ExameRequest $request)
    {
        $formaPagamento = new Exame;
        $formaPagamento->setId($request->id);
        $formaPagamento->setFormaPagamento($request->forma_pagamento);
        $formaPagamento->setCreated_at($request->created_at);
        $formaPagamento->setUpdated_at(now()->toDateTimeString());
        $dados = $this->getDados($formaPagamento);
        return $this->exameRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->exameRepository->findById($id);
        $formaPagamento = new Exame;
        $formaPagamento->setId($result->id);
        $formaPagamento->setFormaPagamento($result->forma_pagamento);
        $formaPagamento->setCreated_at($result->created_at ?? null);
        $formaPagamento->setUpdated_at($result->updated_at ?? null);
        return $formaPagamento;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getDados(Exame $exame)
    {
        $dados = [
            'id' => $exame->getId(),
            'exame' => $exame->getExame(),
            'valor' => $exame->getValor(),
            'plano' => $exame->getPlano(),
            'categoria' => $exame->getCategoria(), 
            'created_at' => $exame->getCreated_at(),
            'updated_at' => $exame->getUpdated_at()
        ];
        dd($dados);
        return $dados;
    }
}