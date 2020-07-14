<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cidade extends Model
{
    protected $table = 'cidades';
    
    protected $fillable = [
        'id', 'codigo', 'cidade', 'id_estado','created_at', 'updated_at'
    ];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function medicos()
    {
        return $this->hasMany('App\Medicos', 'id_cidade', 'id');
    }

    public function pacientes()
    {
        return $this->hasMany('App\Pacientes', 'id_cidade', 'id');
    }

    public function fornecedores()
    {
        return $this->hasMany('App\Forncecedores', 'id_cidade', 'id');
    }s

}
