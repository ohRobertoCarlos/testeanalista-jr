<?php

namespace App\Repositories;

use App\Endereco;
use Illuminate\Http\Request;

class EnderecoRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Endereco();
    }

    public function create(Request $request, $cliente)
    {

        Endereco::create([
            'logradouro' => $request->logradouro,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'complemento' => $request->complemento,
            'cep' => $request->cep,
            'numero' => $request->numero,
            'estado' => $request->estado,
            'numero' => $request->numero,
            'cliente_id' => $cliente->id,
        ]);

        return true;

    }

    public function atualizarEndereco(Request $request, $cliente)
    {
        $request->validate($this->model->rules(),$this->model->params());

        $antigoPrincipal = current(Endereco::where('principal','1')->get());
        if(count($antigoPrincipal) > 0) {
            current($antigoPrincipal)->update(['principal' => '0']);
        }

        if(isset($request->principal)){
            Endereco::findOrFail($request->principal)->update(['principal' => 1]);
        }


        if ($request->cidade != null && $request->estado != null) {
            $this->create($request,$cliente);
        }
    }


}
