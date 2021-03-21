<?php

namespace App\Services;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;

class ClienteService
{
    public function __construct()
    {
        $this->clienteRepository = New ClienteRepository;
        $this->cidadeService = New CidadeService;
        $this->condicaoPagamentoService = New CondicaoPagamentoService;
    }

    public function instanciarECriar(ClienteRequest $request)
    {
        $cliente = new Cliente;
        $cliente->setTipo($request->tipo);
        $cliente->setCliente($request->cliente);
        $cliente->setApelido($request->apelido);
        $cliente->setNomeFantasia($request->nomeFantasia);
        $cliente->setEndereco($request->endereco);
        $cliente->setNumero($request->numero);
        $cliente->setComplemento($request->complemento);
        $cliente->setBairro($request->bairro);
        $cliente->setCEP($request->cep);

        $cidade = $this->cidadeService->buscarEInstanciar($request->id_cidade);
        $cliente->setCidade($cidade);

        $cliente->setTelefone($request->telefone);
        $cliente->setCelular($request->celular);
        $cliente->setEmail($request->email);
        $cliente->setNacionalidade($request->nacionalidade);
        $cliente->setCPF($request->cpf);
        $cliente->setRG ($request->rg);
        $cliente->setNascimento ($request->nascimento);

        $cliente->setInscricaoEstadual($request->inscricaoEstadual);
        $cliente->setCNPJ($request->cnpj);
        $cliente->setObservacao ($request->observacao);
        $cliente->setLimiteCredito ($request->limiteCredito);

        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->condicaoPagamento);
        $cliente->setCondicaoPagamento($condicaoPagamento);

        $cliente->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($cliente);

        return $this->clienteRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(ClienteRequest $request)
    {
        // $formaPagamento = new FormaPagamento;
        // $formaPagamento->setId($request->id);
        // $formaPagamento->setFormaPagamento($request->forma_pagamento);
        // $formaPagamento->setCreated_at($request->created_at);
        // $formaPagamento->setUpdated_at(Carbon::now()->toDateTimeString());
        // $dados = $this->getDados($formaPagamento);
        // return $this->formaPagamentoRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        // $result = $this->formaPagamentoRepository->findById($id);
        // $formaPagamento = new FormaPagamento;
        // $formaPagamento->setId($result->id);
        // $formaPagamento->setFormaPagamento($result->forma_pagamento);
        // $formaPagamento->setCreated_at($result->created_at ?? null);
        // $formaPagamento->setUpdated_at($result->updated_at ?? null);
        // return $formaPagamento;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    public function getDados(Cliente $cliente)
    {
        $dados = [
            'id' => $cliente->getId(),

            'tipo' => $cliente->getTipo(),
            'cliente' => $cliente->getId(),
            'apelido' => $cliente->getApelido(),
            'nome_fantasia' => $cliente->getNomeFantasia(),
            'endereco' => $cliente->getEndereco(),
            'numero' => $cliente->getNumero(),
            'complemento' => $cliente->getComplemento(),
            'bairro' => $cliente->getBairro(),
            'cep' => $cliente->getCEP(),

            'id_cidade' => $cliente->getCidade(),

            'telefone' => $cliente->getId(),
            'celular' => $cliente->getId(),
            'email' => $cliente->getId(),
            'nacionalidade' => $cliente->getId(),
            'cpf' => $cliente->getId(),
            'rg' => $cliente->getId(),
            'nascimento' => $cliente->getId(),
            'inscricao_estadual' => $cliente->getId(),
            'cnpj' => $cliente->getId(),
            'observacao' => $cliente->getId(),
            'limite_credito' => $cliente->getId(),

            'condicao_pagamento' => $cliente->getId(),

            'created_at' => $cliente->getCreated_at(),
            'updated_at' => $cliente->getUpdated_at()
        ];
        return $dados;
    }
}