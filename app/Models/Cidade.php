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
        $ddd = null;
        $cidade = '';
        $estado = new Estado();
    }

    public function getDDD(): int
    {
        return $this->ddd;
    }

    public function setDDD(int $ddd)
    {
        $this->ddd = $ddd;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }

    public function getEstado(): Estado
    {
        return $this->estado;
    }

    public function setEstado(Estado $estado)
    {
        $this->estado = $estado;
    }
}