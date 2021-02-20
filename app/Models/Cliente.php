<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'tipo', 'cliente', 'apelido', 'nome_fantasia',
        'endereco', 'numero', 'complemento', 'bairro', 'cep', 'id_cidade',
        'telefone', 'celular', 'email', 'nacionalidade', 'nascimento',
        'cpf', 'rg', 'emissor', 'uf', 'cnpj', 'inscricao_estadual',
        'observacao', 'limite_credito', 'id_condicao_pagamento'
    ];
}