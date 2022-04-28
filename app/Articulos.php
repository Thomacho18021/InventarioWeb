<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $table = 'articulos';

    protected $guarded = [];

    public function categoria()
    {
        return $this->hasOne('App\Categorias', 'id','id_categoria');
    }

}
