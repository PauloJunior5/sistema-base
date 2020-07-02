<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $table = 'exames';
    
    protected $fillable = [
        'id', 'exame', 'valor', 'plano', 'categoria', 'updated_at', 'created_at'
    ];

}
