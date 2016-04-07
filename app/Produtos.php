<?php

namespace CursoLaravel;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = ['cod','nome'];

    // Regras para validação
    static $rules =  [
        'cod'=>'required|numeric|min:3|unique:produtos',
        'nome'=>'required|min:5',
    ];
}
