<?php

$fillable = [
    'condicao_pagamento', 'multa', 'juro', 'desconto', 'parcelas'
];

namespace App\Models;

use App\Models\Model;

class FormaPagamento extends Model
{
    protected string $condicaoPagamento;
    protected float $multa;
    protected float $juro;
    protected float $desconto;
    protected string $parcelas;


    public function __construct()
    {
        $this->condicaoPagamento = '';
        $this->multa = 0;
        $this->juro = 0;
        $this->desconto = 0;
        $this->parcelas = '';
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Condição de Pagamento
    |--------------------------------------------------------------------------
    |
    */
    public function getCondicaoPagamento(): string
    {
        return $this->condicaoPagamento;
    }

    public function setCondicaoPagamento($condicaoPagamento)
    {
        $this->condicaoPagamento = $condicaoPagamento;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Multa
    |--------------------------------------------------------------------------
    |
    */
    public function getMulta(): float
    {
        return $this->multa;
    }

    public function setMulta($multa)
    {
        $this->multa = $multa;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Juro
    |--------------------------------------------------------------------------
    |
    */
    public function getJuro(): float
    {
        return $this->juro;
    }

    public function setJuro($juro)
    {
        $this->juro = $juro;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Desconto
    |--------------------------------------------------------------------------
    |
    */
    public function getDesconto(): float
    {
        return $this->desconto;
    }

    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Parcelas
    |--------------------------------------------------------------------------
    |
    */
    public function getParcelas(): string
    {
        return $this->parcelas;
    }

    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
    }
}