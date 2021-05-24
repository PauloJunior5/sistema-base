<?php

namespace App\Models;

use App\Models\Model;

class Pais extends Model
{
    protected $pais;
    protected $sigla;

    public function __construct()
    {
        $this->pais = '';
        $this->sigla = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set País
    |--------------------------------------------------------------------------
    |
    */
    public function getPais(): string
    {
        return $this->pais;
    }

    public function setPais(string $pais)
    {
        $this->pais = $pais;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Sigla
    |--------------------------------------------------------------------------
    |
    */
    public function getSigla(): string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla)
    {
        $this->sigla = $sigla;
    }
}