<?php

namespace App\Models;

use App\Models\Model;

class Estado extends Model
{
    protected string $uf;
    protected string $estado;
    protected Pais $pais;

    public function __construct()
    {
        $this->uf = '';
        $this->estado = '';
        $this->pais = new Pais();
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set UF
    |--------------------------------------------------------------------------
    |
    */
    public function getUF(): string
    {
        return $this->uf;
    }

    public function setUF(string $uf)
    {
        $this->uf = $uf;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Estado
    |--------------------------------------------------------------------------
    |
    */
    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set País
    |--------------------------------------------------------------------------
    |
    */
    public function getPais(): Pais
    {
        return $this->pais;
    }

    public function setPais(Pais $pais)
    {
        $this->pais = $pais;
    }
}