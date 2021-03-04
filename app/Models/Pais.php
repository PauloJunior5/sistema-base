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

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais(string $pais)
    {
        $this->pais = $pais;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla)
    {
        $this->sigla = $sigla;
    }
}