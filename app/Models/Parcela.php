<?php

namespace App\Models;

use App\Models\Model;

class Parcela
{
    protected $parcela;
    protected $dias;
    protected $porcentual;
    protected $condicaoPagamento;
    protected $formaPagamento;

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

    public function setParcela(int $parcela)
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

    public function setDias(int $dias)
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

    public function setPorcentual(float $porcentual)
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

    public function setCondicaoPagamento(CondicaoPagamento $condicaoPagamento)
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

    public function setFormaPagamento(FormaPagamento $formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }
}