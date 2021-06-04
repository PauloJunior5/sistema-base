<?php

namespace App\Models;

use App\Models\Model;

class Fornecedor extends Model
{
    protected $fornecedor;
    protected $nomeFantasia;
    protected $endereco;
    protected $numero;
    protected $complemento;
    protected $bairro;
    protected $cep;
    protected $cidade;
    protected $telefone;
    protected $celular;
    protected $email;
    protected $contato;
    protected $cnpj;
    protected $inscricaoEstadual;
    protected $observacao;
    protected $limiteCredito;
    protected $condicaoPagamento;

    public function __construct()
    {
        $this->fornecedor = '';
        $this->nomeFantasia = '';
        $this->endereco = '';
        $this->numero = '';
        $this->complemento = '';
        $this->bairro = '';
        $this->cep = '';
        $this->cidade = new Cidade();
        $this->telefone = '';
        $this->celular = '';
        $this->email = '';
        $this->contato = '';
        $this->cnpj = '';
        $this->inscricaoEstadual = '';
        $this->observacao = '';
        $this->limiteCredito = '';
        $this->condicaoPagamento = new CondicaoPagamento();
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Fornecedor
    |--------------------------------------------------------------------------
    |
    */
    public function getFornecedor(): string
    {
        return $this->fornecedor;
    }

    public function setFornecedor(string $fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Nome Fantasia
    |--------------------------------------------------------------------------
    |
    */
    public function getNomeFantasia(): string
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia(string $nomeFantasia)
    {
        $this->nomeFantasia = $nomeFantasia;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Endereço
    |--------------------------------------------------------------------------
    |
    */
    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Numero
    |--------------------------------------------------------------------------
    |
    */
    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Complemento
    |--------------------------------------------------------------------------
    |
    */
    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento)
    {
        $this->complemento = $complemento;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Bairro
    |--------------------------------------------------------------------------
    |
    */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro)
    {
        $this->bairro = $bairro;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set CEP
    |--------------------------------------------------------------------------
    |
    */
    public function getCEP(): string
    {
        return $this->cep;
    }

    public function setCEP(string $cep)
    {
        $this->cep = $cep;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Cidade
    |--------------------------------------------------------------------------
    |
    */
    public function getCidade(): Cidade
    {
        return $this->cidade;
    }

    public function setCidade(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Telefone
    |--------------------------------------------------------------------------
    |
    */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Celular
    |--------------------------------------------------------------------------
    |
    */
    public function getCelular(): string
    {
        return $this->celular;
    }

    public function setCelular(string $celular)
    {
        $this->celular = $celular;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Email
    |--------------------------------------------------------------------------
    |
    */
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Contato
    |--------------------------------------------------------------------------
    |
    */
    public function getContato(): string
    {
        return $this->contato;
    }

    public function setContato(string $contato)
    {
        $this->contato = $contato;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set CNPJ
    |--------------------------------------------------------------------------
    |
    */
    public function getCNPJ(): string
    {
        return $this->cnpj;
    }

    public function setCNPJ(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Inscrição Estadual
    |--------------------------------------------------------------------------
    |
    */
    public function getInscricaoEstadual(): string
    {
        return $this->inscricaoEstadual;
    }

    public function setInscricaoEstadual(string $inscricaoEstadual)
    {
        $this->inscricaoEstadual = $inscricaoEstadual;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Observação
    |--------------------------------------------------------------------------
    |
    */
    public function getObservacao(): string
    {
        return $this->observacao;
    }

    public function setObservacao(string $observacao)
    {
        $this->observacao = $observacao;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Limite de Crédito
    |--------------------------------------------------------------------------
    |
    */
    public function getLimiteCredito(): string
    {
        return $this->limiteCredito;
    }

    public function setLimiteCredito(string $limiteCredito)
    {
        $this->limiteCredito = $limiteCredito;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Condição de Pagamento
    |--------------------------------------------------------------------------
    |
    */
    public function getCondicaoPagamento(): CondicaoPagamento
    {
        return $this->condicaoPagamento;
    }

    public function setCondicaoPagamento($condicaoPagamento)
    {
        $this->condicaoPagamento = $condicaoPagamento;
    }
}