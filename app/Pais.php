<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';
    
    protected $fillable = [
        'id', 'codigo', 'pais', 'updated_at', 'created_at'
    ];

    public function Estados()
    {
        return $this->hasMany('App\Estado', 'id_pais', 'id');
    }

}
