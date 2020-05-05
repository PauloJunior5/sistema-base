<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cidade extends Model
{
    protected $table = 'cidades';
    
    protected $fillable = [
        'id', 'codigo', 'nome', 'pais', 'estado','created_at', 'updated_at'
    ];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

}
