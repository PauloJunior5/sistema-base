<?php

namespace App\Models;

class Contrato extends Model
{
    protected $cliente;
    protected $funcionarios;

    function __construct()
    {
        $this->cliente = '';
        $this->funcionarios = null;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente(string $cliente)
    {
        $this->cliente = $cliente;
    }

    public function getFuncionarios()
    {
        return $this->funcionarios;
    }

    public function setFuncionarios(array $funcionarios)
    {
        $this->funcionarios = $funcionarios;
    }
}