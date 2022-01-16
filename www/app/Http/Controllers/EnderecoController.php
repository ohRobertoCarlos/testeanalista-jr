<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use App\Repositories\EnderecoRepository;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EnderecoRepository();
    }

    public function index($cliente_id)
    {
        $enderecos = Cliente::find($cliente_id)->enderecos;

        return view('app.endereco.index', ['enderecos' => $enderecos]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $endereco = Endereco::find($id);
        return view('app.endereco.show', ['endereco' => $endereco]);
    }


    public function edit($id)
    {
        $endereco = Endereco::find($id);

        return view('app.endereco.edit', ['endereco' => $endereco]);
    }


    public function update(Request $request, $id)
    {
        $endereco = Endereco::find($id);

        if (intval($request->principal) == 1) {
            $this->repository->removerAntigoPrincipal($endereco->cliente_id);
        }

        $endereco->update($request->all());

        return redirect()->route('endereco.index',['cliente_id' => $endereco->cliente_id]);
    }


    public function destroy($id)
    {
        Endereco::findOrFail($id)->delete();

        return redirect()->route('clientes.index');
    }

}
