<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';
    
    protected $fillable = [
        'id', 'sigla', 'pais', 'updated_at', 'created_at'
    ];

    public function Estados()
    {
        return $this->hasMany('App\Estado', 'id_pais', 'id');
    }

}
