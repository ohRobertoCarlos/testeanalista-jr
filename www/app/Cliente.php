<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Endereco;

class Cliente extends Model
{

    protected $fillable = [
        'nome_empresa','cnpj','telefone','email','nome_responsavel'
    ];

    public function rules()
    {
        return [
            'nome_empresa' => 'required|min:2',
            'cnpj' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'nome_responsavel' => 'required',
        ];
    }

    public function params()
    {
        return [
            'min' => 'O :attribute tem que ter no mínimo 2 caracteres',
        ];
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'cliente_id','id');
    }
}
