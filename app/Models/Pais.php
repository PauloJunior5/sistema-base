<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Pais extends Model
// {
//     protected $table = 'paises';
    
//     protected $fillable = [
//         'id', 'sigla', 'pais', 'updated_at', 'created_at'
//     ];

//     public function Estados()
//     {
//         return $this->hasMany('App\Estado', 'id_pais', 'id');
//     }

// }

namespace App\Models;

class Pais extends Model
{
    protected $pais;
    protected $sigla;

    function __construct()
    {
        $this->pais = '';
        $this->sigla = '';
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais(string $pais)
    {
        $this->pais = $pais;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla)
    {
        $this->sigla = $sigla;
    }
}