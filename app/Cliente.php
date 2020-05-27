<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    
    protected $fillable = [
        'id', 'codigo', 'nome', 'updated_at', 'created_at'
    ];

}
