<?php

namespace App\Models;

class Contrato extends Model
{
    protected $contrato;
    protected $responsavel;
    protected $cliente;

    function __construct()
    {
        $this->contrato = '';
        $this->responsavel = new Cliente;
        $this->cliente = new Cliente;
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
}