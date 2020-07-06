<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $fillable = [
        'laboratorio', 'nome_fantasia',
        'endereco', 'numero', 'complemento', 'bairro', 'cep', 'id_cidade',
        'telefone', 'celular', 'email', 'contato',
        'cnpj', 'inscricao_estadual',
        'observacao', 'limite_credito', 'id_condicao_pagamento'
    ];
}