<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Pais;

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

    public function getUF(): string
    {
        return $this->uf;
    }

    public function setUF(string $uf)
    {
        $this->uf = $uf;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }

    public function getPais(): Pais
    {
        return $this->pais;
    }

    public function setPais(Pais $pais)
    {
        $this->pais = $pais;
    }
}