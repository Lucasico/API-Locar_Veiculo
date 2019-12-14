<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locar extends Model
{
    protected $table = 'locar_carro';
    public $timestamps = false;

    public $fillable = ['id', 'qtd_dias', 'carro_locado', 'valor', 'cliente'];
}
