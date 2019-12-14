<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    public $timestamps = false;

    public $fillable = ['id', 'nome', 'email', 'cpf', 'telefone'];
}
