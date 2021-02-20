<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CondicaoPagamento extends Model
{
    protected $fillable = [
        'condicao_pagamento', 'multa', 'juro', 'desconto', 'parcelas'
    ];
}
