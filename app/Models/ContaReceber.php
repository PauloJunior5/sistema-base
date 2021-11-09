<?php

namespace App\Models;

use App\Models\Model;

class ContaReceber extends Model
{
    protected $parcela;
    protected $valor;
    protected $multa;
    protected $juro;
    protected $desconto;
    protected $contrato;
    protected $cliente;
    protected $formaPagamento;
    protected $dataEmissao;
    protected $dataVencimento;

    public function __construct()
    {
        $this->parcela = 0;
        $this->valor = 0;
        $this->multa = 0;
        $this->juro = 0;
        $this->desconto = 0;
        $this->contrato = new Contrato();
        $this->cliente = new Cliente();
        $this->formaPagamento = new FormaPagamento();
        $this->dataEmissao = '';
        $this->dataVencimento = '';
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
    | Get e Set Valor
    |--------------------------------------------------------------------------
    |
    */
    public function getValor(): string
    {
        return $this->valor;
    }

    public function setValor(string $valor)
    {
        $this->valor = $valor;
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
    | Get e Set Contrato
    |--------------------------------------------------------------------------
    |
    */
    public function getContrato(): Contrato
    {
        return $this->contrato;
    }

    public function setContrato(Contrato $contrato)
    {
        $this->contrato = $contrato;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Cliente
    |--------------------------------------------------------------------------
    |
    */
    public function getCliente(): Cliente
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
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

    /*
    |--------------------------------------------------------------------------
    | Get e Set Data de Emissão
    |--------------------------------------------------------------------------
    |
    */
    public function getDataEmissao()
    {
        return $this->dataEmissao;
    }

    public function setDataEmissao(string $dataEmissao = null)
    {
        $this->dataEmissao = $dataEmissao;
    }

    /*
    |--------------------------------------------------------------------------
    | Get e Set Data de Vencimento
    |--------------------------------------------------------------------------
    |
    */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    public function setDataVencimento(string $dataVencimento = null)
    {
        $this->dataVencimento = $dataVencimento;
    }
}