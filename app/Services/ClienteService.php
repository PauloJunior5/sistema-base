<?php

namespace App\Services;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;

class ClienteService
{
    public function __construct()
    {
        $this->clienteRepository = new ClienteRepository;
        $this->cidadeService = new CidadeService;
        $this->condicaoPagamentoService = new CondicaoPagamentoService;
    }

    public function instanciarTodos()
    {
        $results = $this->clienteRepository->mostrarTodos();
        $clientes = collect();

        foreach ($results as $result) {
            $cliente = new Cliente;
            $cliente->setId($result->id);
            if (!empty($result->cpf)) {
                $cliente->setApelido($result->apelido);
                $cliente->setCPF($result->cpf);
                $cliente->setRG ($result->rg);
            } else {
                $cliente->setNomeFantasia($result->nome_fantasia);
                $cliente->setInscricaoEstadual($result->inscricao_estadual);
                $cliente->setCNPJ($result->cnpj);
            }
            $cliente->setTipo($result->tipo);
            $cliente->setCliente($result->cliente);
            $cliente->setEndereco($result->endereco);
            $cliente->setNumero($result->numero);
            $cliente->setComplemento($result->complemento);
            $cliente->setBairro($result->bairro);
            $cliente->setCEP($result->cep);
            $cidade = $this->cidadeService->buscarEInstanciar($result->id_cidade);
            $cliente->setCidade($cidade);
            $cliente->setTelefone($result->telefone);
            $cliente->setCelular($result->celular);
            $cliente->setEmail($result->email);
            $cliente->setNacionalidade($result->nacionalidade);
            $cliente->setNascimento ($result->nascimento);
            $cliente->setObservacao ($result->observacao);
            $cliente->setLimiteCredito ($result->limite_credito);
            $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($result->condicao_pagamento);
            $cliente->setCondicaoPagamento($condicaoPagamento);
            $cliente->setCreated_at($result->created_at ?? null);
            $cliente->setUpdated_at($result->updated_at ?? null);
            $clientes->push($cliente);
        }

        return $clientes;
    }

    public function instanciarECriar(ClienteRequest $request)
    {
        $cliente = new Cliente;
        if (!empty($request->cpf)) {
            $cliente->setApelido($request->apelido);
            $cliente->setCPF($request->cpf);
            $cliente->setRG ($request->rg);
        } else {
            $cliente->setNomeFantasia($request->nomeFantasia);
            $cliente->setInscricaoEstadual($request->inscricaoEstadual);
            $cliente->setCNPJ($request->cnpj);
        }
        $cliente->setTipo($request->tipo);
        $cliente->setCliente($request->cliente);
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
        $cliente->setNascimento ($request->nascimento);
        $cliente->setObservacao ($request->observacao);
        $cliente->setLimiteCredito ($request->limiteCredito);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $cliente->setCondicaoPagamento($condicaoPagamento);
        $cliente->setCreated_at(now()->toDateTimeString());
        $dados = $this->getDados($cliente);
        return $this->clienteRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(ClienteRequest $request)
    {
        $cliente = new Cliente;
        $cliente->setId($request->id);
        if (!empty($request->cpf)) {
            $cliente->setApelido($request->apelido);
            $cliente->setCPF($request->cpf);
            $cliente->setRG ($request->rg);
        } else {
            $cliente->setNomeFantasia($request->nomeFantasia);
            $cliente->setInscricaoEstadual($request->inscricaoEstadual);
            $cliente->setCNPJ($request->cnpj);
        }
        $cliente->setTipo($request->tipo);
        $cliente->setCliente($request->cliente);
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
        $cliente->setNascimento ($request->nascimento);
        $cliente->setObservacao ($request->observacao);
        $cliente->setLimiteCredito ($request->limiteCredito);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $cliente->setCondicaoPagamento($condicaoPagamento);
        $cliente->setCreated_at($request->created_at);
        $cliente->setUpdated_at(now()->toDateTimeString());
        $dados = $this->getDados($cliente);
        return $this->clienteRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->clienteRepository->findById($id);
        $cliente = new Cliente;
        $cliente->setId($result->id);
        if ($result->tipo == 'pessoaFisica') {
            $cliente->setApelido($result->apelido);
            $cliente->setCPF($result->cpf);
            $cliente->setRG ($result->rg);
        } else {
            $cliente->setNomeFantasia($result->nome_fantasia);
            $cliente->setInscricaoEstadual($result->inscricao_estadual);
            $cliente->setCNPJ($result->cnpj);
        }
        $cliente->setTipo($result->tipo);
        $cliente->setCliente($result->cliente);
        $cliente->setEndereco($result->endereco);
        $cliente->setNumero($result->numero);
        $cliente->setComplemento($result->complemento);
        $cliente->setBairro($result->bairro);
        $cliente->setCEP($result->cep);
        $cidade = $this->cidadeService->buscarEInstanciar($result->id_cidade);
        $cliente->setCidade($cidade);
        $cliente->setTelefone($result->telefone);
        $cliente->setCelular($result->celular);
        $cliente->setEmail($result->email);
        $cliente->setNacionalidade($result->nacionalidade);
        $cliente->setNascimento ($result->nascimento);
        $cliente->setObservacao ($result->observacao);
        $cliente->setLimiteCredito ($result->limite_credito);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($result->condicao_pagamento);
        $cliente->setCondicaoPagamento($condicaoPagamento);
        $cliente->setCreated_at($result->created_at ?? null);
        $cliente->setUpdated_at($result->updated_at ?? null);
        return $cliente;
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
            'cliente' => $cliente->getCliente(),
            'apelido' => $cliente->getApelido(),
            'nome_fantasia' => $cliente->getNomeFantasia(),
            'endereco' => $cliente->getEndereco(),
            'numero' => $cliente->getNumero(),
            'complemento' => $cliente->getComplemento(),
            'bairro' => $cliente->getBairro(),
            'cep' => $cliente->getCEP(),
            'id_cidade' => $cliente->getCidade()->getId(),
            'telefone' => $cliente->getTelefone(),
            'celular' => $cliente->getCelular(),
            'email' => $cliente->getEmail(),
            'nacionalidade' => $cliente->getNacionalidade(),
            'cpf' => $cliente->getCPF(),
            'rg' => $cliente->getRG(),
            'nascimento' => $cliente->getNascimento(),
            'inscricao_estadual' => $cliente->getInscricaoEstadual(),
            'cnpj' => $cliente->getCNPJ(),
            'observacao' => $cliente->getObservacao(),
            'limite_credito' => $cliente->getLimiteCredito(),
            'condicao_pagamento' => $cliente->getCondicaoPagamento()->getId(),
            'created_at' => $cliente->getCreated_at(),
            'updated_at' => $cliente->getUpdated_at()
        ];
        return $dados;
    }
}