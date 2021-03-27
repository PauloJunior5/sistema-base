<?php

namespace App\Models;

class Contrato extends Model
{
    protected string $contrato;
    protected Cliente $responsavel;

    function __construct()
    {
        $this->contrato = '';
        $this->responsavel = new Cliente;
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
}