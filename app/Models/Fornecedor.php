<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $table = 'fornecedores';

    protected $fillable = [
        'fornecedor', 'nome_fantasia',
        'endereco', 'numero', 'complemento', 'bairro', 'cep', 'id_cidade',
        'telefone', 'celular', 'email', 'contato',
        'cnpj', 'inscricao_estadual',
        'observacao', 'limite_credito', 'id_condicao_pagamento'
    ];

    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }
}