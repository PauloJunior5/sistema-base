<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    
    protected $fillable = [
        'id', 'paciente', 'apelido', 'id_medico', 'endereco', 'numero', 'complemento',
        'bairro', 'cep', 'id_cidade', 'sexo', 'nascimento', 'estado_civil', 'nacionalidade',
        'telefone', 'celular', 'email', 'cpf', 'rg', 'emissor', 'uf', 'observacao',
        'updated_at', 'created_at'
    ];

    public function cidade()
    {
        return $this->belongsTo('App\Cidade');
    }

    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

}
