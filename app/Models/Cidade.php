<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Estado;

class Cidade extends Model
{
    protected int $ddd;
    protected string $cidade;
    protected Estado $estado;

    public function __construct()
    {
        $this->ddd = null;
        $this->cidade = '';
        $this->estado = new Estado();
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set DDD
    |--------------------------------------------------------------------------
    |
    */
    public function getDDD(): int
    {
        return $this->ddd;
    }

    public function setDDD(int $ddd)
    {
        $this->ddd = $ddd;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Cidade
    |--------------------------------------------------------------------------
    |
    */
    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Estado
    |--------------------------------------------------------------------------
    |
    */
    public function getEstado(): Estado
    {
        return $this->estado;
    }

    public function setEstado(Estado $estado)
    {
        $this->estado = $estado;
    }
}