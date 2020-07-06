<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $fillable = [
        'tipo', 'cliente', 'apelido', 'nome_fantasia', 'estado_civil',
        'endereco', 'numero', 'complemento', 'bairro', 'cep', 'id_cidade',
        'telefone', 'celular', 'email',
        'cpf', 'rg', 'emissor', 'uf', 'cnpj', 'inscricao_estadual',
        'observacao', 'limite_credito', 'id_condicao_pagamento'
    ];
}