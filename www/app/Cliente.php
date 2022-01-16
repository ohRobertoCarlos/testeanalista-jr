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
            'cnpj' => 'required|min:14|max:14',
            'telefone' => 'required',
            'email' => 'required|email',
            'nome_responsavel' => 'required',
        ];
    }

    public function params()
    {
        return [
            'nome_empresa.min' => 'O :attribute tem que ter no mínimo 2 caracteres',
            'cnpj.max' => 'Forneça um CNPJ válido',
            'cnpj.min' => 'Forneça um CNPJ válido',
            'email.email' => 'Forneça um e-mail válido',
            'required' => 'O campo :attribute é requerido',
        ];
    }

    public function enderecos()
    {
        return $this->hasMany(Endereco::class, 'cliente_id','id');
    }
}
