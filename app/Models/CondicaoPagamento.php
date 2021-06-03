<?php

namespace App\Models;

use App\Models\Model;

class CondicaoPagamento extends Model
{
    protected $condicaoPagamento;
    protected $multa;
    protected $juro;
    protected $desconto;
    protected $qtdParcelas;

    public function __construct()
    {
        $this->condicaoPagamento = '';
        $this->multa = 0;
        $this->juro = 0;
        $this->desconto = 0;
        $this->qtdParcelas = 0;
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

    public function setCondicaoPagamento(string $condicaoPagamento)
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

    public function setMulta(string $multa)
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

    public function setJuro(float $juro)
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

    public function setDesconto(float $desconto)
    {
        $this->desconto = $desconto;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Qtd de Parcelas
    |--------------------------------------------------------------------------
    |
    */
    public function getQtdParcelas(): int
    {
        return $this->qtdParcelas;
    }

    public function setQtdParcelas(int $qtdParcelas)
    {
        $this->qtdParcelas = $qtdParcelas;
    }
}