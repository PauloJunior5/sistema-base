<?php

namespace App\Models;

use App\Models\Model;

class Plano extends Model
{
    protected $plano;
    protected $condicaoPagamento;

    public function __construct()
    {
        $this->plano = '';
        $this->condicaoPagamento = new CondicaoPagamento();
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
    | Get e Set Condição de Pagamento
    |--------------------------------------------------------------------------
    |
    */
    public function getCondicaoPagamento(): CondicaoPagamento
    {
        return $this->condicaoPagamento;
    }

    public function setCondicaoPagamento($condicaoPagamento)
    {
        $this->condicaoPagamento = $condicaoPagamento;
    }
}