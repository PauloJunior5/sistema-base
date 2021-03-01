<?php

namespace App\Models;

use App\Models\Cliente;

class Contrato extends Model
{
    protected $contrato;
    protected Object $responsavel;

    function __construct()
    {
        $this->contrato = '';
        $this->responsavel = new Cliente;
    }

    public function getContrato()
    {
        return $this->contrato;
    }

    public function setContrato(string $contrato)
    {
        $this->contrato = $contrato;
    }

    public function getResponsavel()
    {
        return $this->responsavel;
    }

    public function setResponsavel(Cliente $responsavel)
    {
        $this->responsavel = $responsavel;
    }
}