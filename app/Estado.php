<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Estado extends Model
{
    protected $table = 'estados';
    
    protected $fillable = [
        'id', 'codigo', 'nome', 'pais', 'updated_at', 'created_at'
    ];

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }

    public function cidades()
    {
        return $this->hasMany('App\Cidade', 'estado', 'id');
    }

}
