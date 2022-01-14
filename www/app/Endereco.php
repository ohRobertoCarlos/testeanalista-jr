<?php

namespace App;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    protected $fillable = [
        'logradouro',
        'bairro',
        'cidade',
        'complemento',
        'cep',
        'numero',
        'estado',
        'cliente_id',
        'principal'
    ];



    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id','id');
    }

    public function rules()
    {
        return [
            // 'principal' => 'required',
        ];
    }

    public function params()
    {
        return [
            'required' => 'O campo :attribute é requerido'
        ];
    }
}
