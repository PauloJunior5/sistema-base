<?php

namespace App\Models;

use App\Models\Model;

class Plano extends Model
{
    protected $plano;
    protected $valor;

    public function __construct()
    {
        $this->plano = '';
        $this->valor = 0;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Categoria
    |--------------------------------------------------------------------------
    |
    */
    public function getPlano(): string
    {
        return $this->plano;
    }

    public function setPlano(string $plano)
    {
        $this->plano = $plano;
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
}