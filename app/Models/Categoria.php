<?php

namespace App\Models;

use App\Models\Model;

class Categoria extends Model
{
    protected $categoria;

    public function __construct()
    {
        $this->categoria = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Categoria
    |--------------------------------------------------------------------------
    |
    */
    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria)
    {
        $this->categoria = $categoria;
    }
}