<?php

namespace App\Models;

class Contrato extends Model
{
    protected $contrato;
    protected $responsavel;

    function __construct()
    {
        $this->contrato = '';
        $this->responsavel = null;
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

    public function setResponsavel(int $responsavel)
    {
        $this->responsavel = $responsavel;
    }
}