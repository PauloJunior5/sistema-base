<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';
    
    protected $fillable = [
        'id', 'codigo', 'nome', 'updated_at', 'created_at'
    ];

    public function Estados()
    {
        return $this->hasMany('App\Estado', 'pais', 'id');
    }

}
