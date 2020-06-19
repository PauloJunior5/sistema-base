<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'tipo', 'cliente', 'apelido', 'estado_civil',
        'endereco', 'numero', 'complemento', 'bairro', 'cep', 'cidade',
        'telefone', 'email', 'sexo', 'nacionalidade', 'nascimento',
        'cpf', 'rg', 'emissor', 'uf',
        'observacao', 'limite_credito', 'condicao_pagamento'
    ];
}