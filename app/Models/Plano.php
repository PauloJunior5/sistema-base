<?php

namespace App\Models;

use App\Models\Model;

class Plano extends Model
{
    protected $plano;

    public function __construct()
    {
        $this->plano = '';
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
}