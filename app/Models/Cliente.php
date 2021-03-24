<?php

namespace App\Models;

use App\Models\Model;

class Cliente extends Model
{
    protected string $tipo;
    protected string $cliente;
    protected string $apelido;
    protected string $nomeFantasia;
    protected string $endereco;
    protected string $numero;
    protected string $complemento;
    protected string $bairro;
    protected string $cep;
    protected Cidade $cidade;
    protected string $telefone;
    protected string $celular;
    protected string $email;
    protected string $nacionalidade;
    protected string $cpf;
    protected string $rg;
    protected string $nascimento;
    protected string $inscricaoEstadual;
    protected string $cnpj;
    protected string $observacao;
    protected float $limiteCredito;
    protected CondicaoPagamento $condicaoPagamento;

    public function __construct()
    {
        $this->tipo = '';
        $this->cliente = '';
        $this->apelido = '';
        $this->nomeFantasia = '';
        $this->endereco = '';
        $this->numero = '';
        $this->complemento = '';
        $this->bairro = '';
        $this->cep = '';
        $this->cidade = New Cidade;
        $this->telefone = '';
        $this->celular = '';
        $this->email = '';
        $this->nacionalidade = '';
        $this->cpf = '';
        $this->rg = '';
        $this->nascimento = '';
        $this->inscricaoEstadual = '';
        $this->cnpj = '';
        $this->observacao = '';
        $this->limiteCredito = 0;
        $this->condicaoPagamento = New CondicaoPagamento;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Tipo
    |--------------------------------------------------------------------------
    |
    */
    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Cliente
    |--------------------------------------------------------------------------
    |
    */
    public function getCliente(): string
    {
        return $this->cliente;
    }

    public function setCliente(string $cliente)
    {
        $this->cliente = $cliente;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Apelido
    |--------------------------------------------------------------------------
    |
    */
    public function getApelido(): string
    {
        return $this->apelido;
    }

    public function setApelido(string $apelido)
    {
        $this->apelido = $apelido;
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
    | Get e Set Nacionalidade
    |--------------------------------------------------------------------------
    |
    */
    public function getNacionalidade(): string
    {
        return $this->nacionalidade;
    }

    public function setNacionalidade(string $nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set CPF
    |--------------------------------------------------------------------------
    |
    */
    public function getCPF(): string
    {
        return $this->cpf;
    }

    public function setCPF(string $cpf)
    {
        $this->cpf = $cpf;
    }


    /*
    |--------------------------------------------------------------------------
    | Get e Set RG
    |--------------------------------------------------------------------------
    |
    */
    public function getRG(): string
    {
        return $this->rg;
    }

    public function setRG(string $rg)
    {
        $this->rg = $rg;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Nascimento
    |--------------------------------------------------------------------------
    |
    */
    public function getNascimento(): string
    {
        return $this->nascimento;
    }

    public function setNascimento(string $nascimento)
    {
        $this->nascimento = $nascimento;
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
    public function getLimiteCredito(): float
    {
        return $this->limiteCredito;
    }

    public function setLimiteCredito(float $limiteCredito)
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

    public function setCondicaoPagamento(CondicaoPagamento $condicaoPagamento)
    {
        $this->condicaoPagamento = $condicaoPagamento;
    }
}