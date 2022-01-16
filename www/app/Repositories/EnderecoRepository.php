<?php

namespace App\Repositories;

use App\Cliente;
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

    public function removerAntigoPrincipal($idCliente)
    {
        $cliente = Cliente::find($idCliente);

        foreach (current($cliente->enderecos) as $endereco) {
            if ($endereco->principal == 1) {
                $endereco->update(['principal' => '0']);
            }
        }

        return true;
    }

    public function atualizarEndereco(Request $request, $cliente)
    {
        $request->validate($this->model->rules(),$this->model->params());

        $this->removerAntigoPrincipal($cliente->id);

        // Adiciona novo endereço principal
        if(isset($request->principal)){
            Endereco::findOrFail($request->principal)->update(['principal' => 1]);
        }

        if ($request->cidade != null && $request->estado != null) {
            $this->create($request,$cliente);
        }

        return true;
    }


}
