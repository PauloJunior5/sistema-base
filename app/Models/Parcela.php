<?php

namespace App\Models;

use App\Models\Model;

class Parcela extends Model
{
    protected int $parcela;
    protected int $dias;
    protected float $porcentual;
    protected CondicaoPagamento $condicaoPagamento;
    protected FormaPagamento $formaPagamento;

    public function __construct()
    {
        $this->parcela = 0;
        $this->dias = 0;
        $this->porcentual = 0;
        $this->condicaoPagamento = new CondicaoPagamento();
        $this->formaPagamento = new FormaPagamento();
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Parcela
    |--------------------------------------------------------------------------
    |
    */
    public function getParcela(): int
    {
        return $this->parcela;
    }

    public function setParcela($parcela)
    {
        $this->parcela = $parcela;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Dias
    |--------------------------------------------------------------------------
    |
    */
    public function getDias(): int
    {
        return $this->dias;
    }

    public function setDias($dias)
    {
        $this->dias = $dias;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Porcentual
    |--------------------------------------------------------------------------
    |
    */
    public function getPorcentual(): float
    {
        return $this->porcentual;
    }

    public function setPorcentual($porcentual)
    {
        $this->porcentual = $porcentual;
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

    public function setCondicaoPagamento($condicaoPagamento = 1)
    {
        $this->condicaoPagamento = $condicaoPagamento;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Forma de Pagamento
    |--------------------------------------------------------------------------
    |
    */
    public function getFormaPagamento(): FormaPagamento
    {
        return $this->formaPagamento;
    }

    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }
}