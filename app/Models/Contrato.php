<?php

namespace App\Models;

class Contrato extends Model
{
    protected $cliente;

    function __construct()
    {
        $this->cliente = '';
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente(string $cliente)
    {
        $this->cliente = $cliente;
    }
}