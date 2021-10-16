<?php

namespace App\Models;

use App\Models\Model;

class Exame extends Model
{
    protected $exame;
    protected $valor;
    protected $plano;
    protected $categoria;

    public function __construct()
    {
        $this->exame = '';
        $this->valor = 0;
        $this->plano = '';
        $this->pais = new Categoria();
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Exame
    |--------------------------------------------------------------------------
    |
    */
    public function getExame(): string
    {
        return $this->exame;
    }

    public function setExame(string $exame)
    {
        $this->exame = $exame;
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
    | Get e Set Plano
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
    | Get e Set Categoria
    |--------------------------------------------------------------------------
    |
    */
    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }
}