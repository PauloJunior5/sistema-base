<?php

namespace App\Services;

use App\Models\Fornecedor;
use App\Http\Requests\FornecedorRequest;
use App\Repositories\FornecedorRepository;

class FornecedorService
{
    public function __construct()
    {
        $this->fornecedorRepository = new FornecedorRepository;
        $this->cidadeService = new CidadeService;
        $this->condicaoPagamentoService = new CondicaoPagamentoService;
    }

    public function instanciarTodos()
    {
        $results = $this->fornecedorRepository->mostrarTodos();
        $fornecedores = collect();

        foreach ($results as $result) {
            $fornecedor = new Fornecedor;
            $fornecedor->setId($result->id);
            $fornecedor->setCreated_at($result->created_at ?? null);
            $fornecedor->setUpdated_at($result->updated_at ?? null);
            $fornecedor->setFornecedor($result->fornecedor);
            $fornecedor->setNomeFantasia($result->nome_fantasia);
            $fornecedor->setEndereco($result->endereco);
            $fornecedor->setNumero($result->numero);
            $fornecedor->setComplemento($result->complemento);
            $fornecedor->setBairro($result->bairro);
            $fornecedor->setCEP($result->cep);
            $fornecedor->setTelefone($result->telefone);
            $fornecedor->setCelular($result->celular);
            $fornecedor->setEmail($result->email);
            $fornecedor->setContato($result->contato);
            $fornecedor->setCNPJ($result->cnpj);
            $fornecedor->setInscricaoEstadual($result->inscricao_estadual);
            $fornecedor->setObservacao($result->observacao);
            $fornecedor->setLimiteCredito($result->limite_credito);
            $cidade = $this->cidadeService->buscarEInstanciar($result->id_cidade);
            $fornecedor->setCidade($cidade);
            $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($result->id_condicao_pagamento);
            $fornecedor->setCondicaoPagamento($condicaoPagamento);
            $fornecedores->push($fornecedor);
        }

        return $fornecedores;
    }

    public function instanciarECriar(FornecedorRequest $request)
    {
        $fornecedor = new Fornecedor;
        $fornecedor->setFornecedor($request->fornecedor);
        $fornecedor->setNomeFantasia($request->nome_fantasia);
        $fornecedor->setEndereco($request->endereco);
        $fornecedor->setNumero($request->numero);
        $fornecedor->setComplemento($request->complemento);
        $fornecedor->setBairro($request->bairro);
        $fornecedor->setCEP($request->cep);
        $fornecedor->setTelefone($request->telefone);
        $fornecedor->setCelular($request->celular);
        $fornecedor->setEmail($request->email);
        $fornecedor->setContato($request->contato);
        $fornecedor->setCNPJ($request->cnpj);
        $fornecedor->setInscricaoEstadual($request->inscricao_estadual);
        $fornecedor->setObservacao($request->observacao);
        $fornecedor->setLimiteCredito($request->limite_credito);
        $fornecedor->setCreated_at(now()->toDateTimeString());
        $cidade = $this->cidadeService->buscarEInstanciar($request->id_cidade);
        $fornecedor->setCidade($cidade);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $fornecedor->setCondicaoPagamento($condicaoPagamento);
        $dados = $this->getDados($fornecedor);
        return $this->fornecedorRepository->adicionar($dados);
    }

    public function instanciarEAtualizar(FornecedorRequest $request)
    {
        $fornecedor = new Fornecedor;
        $fornecedor->setId($request->id);
        $fornecedor->setCreated_at($request->created_at);
        $fornecedor->setUpdated_at(now()->toDateTimeString());
        $fornecedor->setFornecedor($request->fornecedor);
        $fornecedor->setNomeFantasia($request->nome_fantasia);
        $fornecedor->setEndereco($request->endereco);
        $fornecedor->setNumero($request->numero);
        $fornecedor->setComplemento($request->complemento);
        $fornecedor->setBairro($request->bairro);
        $fornecedor->setCEP($request->cep);
        $fornecedor->setTelefone($request->telefone);
        $fornecedor->setCelular($request->celular);
        $fornecedor->setEmail($request->email);
        $fornecedor->setContato($request->contato);
        $fornecedor->setCNPJ($request->cnpj);
        $fornecedor->setInscricaoEstadual($request->inscricao_estadual);
        $fornecedor->setObservacao($request->observacao);
        $fornecedor->setLimiteCredito($request->limite_credito);
        $cidade = $this->cidadeService->buscarEInstanciar($request->id_cidade);
        $fornecedor->setCidade($cidade);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($request->id_condicao_pagamento);
        $fornecedor->setCondicaoPagamento($condicaoPagamento);
        $dados = $this->getDados($fornecedor);
        return $this->fornecedorRepository->atualizar($dados);
    }

    /**
     *  Retorna objeto a partir do id passado
     * como parametro. Para instanciar o objeto.
     */
    public function buscarEInstanciar(int $id)
    {
        $result = $this->fornecedorRepository->findById($id);
        $fornecedor = new Fornecedor;
        $fornecedor->setId($result->id);
        $fornecedor->setCreated_at($result->created_at ?? null);
        $fornecedor->setUpdated_at($result->updated_at ?? null);
        $fornecedor->setFornecedor($result->fornecedor);
        $fornecedor->setNomeFantasia($result->nome_fantasia);
        $fornecedor->setEndereco($result->endereco);
        $fornecedor->setNumero($result->numero);
        $fornecedor->setComplemento($result->complemento);
        $fornecedor->setBairro($result->bairro);
        $fornecedor->setCEP($result->cep);
        $fornecedor->setTelefone($result->telefone);
        $fornecedor->setCelular($result->celular);
        $fornecedor->setEmail($result->email);
        $fornecedor->setContato($result->contato);
        $fornecedor->setCNPJ($result->cnpj);
        $fornecedor->setInscricaoEstadual($result->inscricao_estadual);
        $fornecedor->setObservacao($result->observacao);
        $fornecedor->setLimiteCredito($result->limite_credito);
        $cidade = $this->cidadeService->buscarEInstanciar($result->id_cidade);
        $fornecedor->setCidade($cidade);
        $condicaoPagamento = $this->condicaoPagamentoService->buscarEInstanciar($result->id_condicao_pagamento);
        $fornecedor->setCondicaoPagamento($condicaoPagamento);
        return $fornecedor;
    }

    /**
     *  Retorna array a partir do objeto passado
     * como parametro, para inserir dados no banco.
     */
    private function getDados(Fornecedor $fornecedor)
    {
        $dados = [
            'id' => $fornecedor->getId(),
            'fornecedor' => $fornecedor->getFornecedor(),
            'nome_fantasia' => $fornecedor->getNomeFantasia(),
            'endereco' => $fornecedor->getEndereco(),
            'numero' => $fornecedor->getNumero(),
            'complemento' => $fornecedor->getComplemento(),
            'bairro' => $fornecedor->getBairro(),
            'cep' => $fornecedor->getCEP(),
            'id_cidade' => $fornecedor->getCidade()->getId(),
            'telefone' => $fornecedor->getTelefone(),
            'celular' => $fornecedor->getCelular(),
            'email' => $fornecedor->getEmail(),
            'contato' => $fornecedor->getContato(),
            'cnpj' => $fornecedor->getCNPJ(),
            'inscricao_estadual' => $fornecedor->getInscricaoEstadual(),
            'observacao' => $fornecedor->getObservacao(),
            'limite_credito' => $fornecedor->getLimiteCredito(),
            'id_condicao_pagamento' => $fornecedor->getCondicaoPagamento()->getId(),
            'created_at' => $fornecedor->getCreated_at(),
            'updated_at' => $fornecedor->getUpdated_at()
        ];
        return $dados;
    }
}