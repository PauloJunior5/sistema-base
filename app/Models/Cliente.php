<?php

namespace App\Models;

use App\Models\Model;

class Cliente extends Model
{
    protected string $tipo;
    protected string $cliente;
    protected string $apelido;
    protected string $nome_fantasia;
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
    protected string $inscricao_estadual;
    protected string $cnpj;
    protected string $observacao;
    protected string $limite_credito;
    protected CondicaoPagamento $condicaoPagamento;

    public function __construct()
    {
        $this->tipo = '';
        $this->cliente = '';
        $this->apelido = '';
        $this->nome_fantasia = '';
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
        $this->inscricao_estadual = '';
        $this->cnpj = '';
        $this->observacao = '';
        $this->limite_credito = '';
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

    public function setTipo($tipo)
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

    public function setCliente($cliente)
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

    public function setApelido($apelido)
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
        return $this->nome_fantasia;
    }

    public function setNomeFantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;
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

    public function setNumero($numero)
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

    public function setComplemento($complemento)
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

    public function setBairro($bairro)
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

    public function setCEP($cep)
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

    public function setTelefone($telefone)
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

    public function setCelular($celular)
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

    public function setEmail($email)
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

    public function setNacionalidade($nacionalidade)
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

    public function setCPF($cpf)
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

    public function setRG($rg)
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
        return $this->rg;
    }

    public function setNascimento($rg)
    {
        $this->rg = $rg;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Inscrição Estadual
    |--------------------------------------------------------------------------
    |
    */
    public function getInscricaoEstadual(): string
    {
        return $this->inscricao_estadual;
    }

    public function setInscricaoEstadual($inscricao_estadual)
    {
        $this->inscricao_estadual = $inscricao_estadual;
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

    public function setCNPJ($cnpj)
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

    public function setObservacao($observacao)
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
        return $this->limite_credito;
    }

    public function setLimiteCredito($limite_credito)
    {
        $this->limite_credito = $limite_credito;
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