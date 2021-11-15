<?php

namespace App\Models;

class Contrato extends Model
{
    protected $contrato;
    protected $valor;
    protected $responsavel;
    protected $cliente;
    protected $condicaoPagamento;
    protected $plano;
    protected $vigencia;

    function __construct()
    {
        $this->contrato = '';
        $this->valor = 0;
        $this->responsavel = new Cliente;
        $this->cliente = new Cliente;
        $this->condicaoPagamento = new CondicaoPagamento();
        $this->plano = new Plano();
        $this->vigencia = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Contrato
    |--------------------------------------------------------------------------
    |
    */
    public function getContrato(): string
    {
        return $this->contrato;
    }

    public function setContrato(string $contrato)
    {
        $this->contrato = $contrato;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Valor
    |--------------------------------------------------------------------------
    |
    */
    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor)
    {
        $this->valor = $valor;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Responsável
    |--------------------------------------------------------------------------
    |
    */
    public function getResponsavel(): Cliente
    {
        return $this->responsavel;
    }

    public function setResponsavel(Cliente $responsavel)
    {
        $this->responsavel = $responsavel;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Cliente
    |--------------------------------------------------------------------------
    |
    */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
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

    /*
    |--------------------------------------------------------------------------
    | Get e Set Vigência
    |--------------------------------------------------------------------------
    |
    */
    public function getVigencia()
    {
        return $this->vigencia;
    }

    public function setVigencia(string $vigencia = null)
    {
        $this->vigencia = $vigencia;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Plano
    |--------------------------------------------------------------------------
    |
    */
    public function getPlano(): Plano
    {
        return $this->plano;
    }

    public function setPlano($plano)
    {
        $this->plano = $plano;
    }
}