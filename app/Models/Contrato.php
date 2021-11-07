<?php

namespace App\Models;

class Contrato extends Model
{
    protected $contrato;
    protected $valor;
    protected $responsavel;
    protected $cliente;
    protected $vigencia;

    function __construct()
    {
        $this->contrato = '';
        $this->valor = 0;
        $this->responsavel = new Cliente;
        $this->cliente = new Cliente;
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
    public function getValor(): string
    {
        return $this->valor;
    }

    public function setValor(string $valor)
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
}