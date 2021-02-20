<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medicos';
    
    protected $fillable = [
        'id', 'medico', 'crm', 'especialidade', 'endereco', 'numero', 'complemento',
        'bairro', 'cep', 'id_cidade', 'nascimento',
        'telefone', 'celular', 'email', 'cpf', 'rg', 'observacao',
        'updated_at', 'created_at'
    ];

    public function pacientes()
    {
        return $this->hasMany('App\Pacientes', 'id_medico', 'id');
    }

    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }
}
