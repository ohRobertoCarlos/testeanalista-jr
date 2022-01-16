<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use App\Repositories\EnderecoRepository;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Cliente();
    }

    public function index()
    {
        $clientes = Cliente::with(['enderecos'])->get();

        return view('app.clientes.index', ['clientes' => $clientes]);
    }


    public function create()
    {
        return view('app.clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->model->rules(),$this->model->params());

        $cliente = Cliente::create($request->all());

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

        return redirect()->route('clientes.index');
    }


    public function show(Cliente $cliente)
    {
        //
    }


    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('app.clientes.edit', ['cliente' => $cliente]);
    }


    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        (new EnderecoRepository)->atualizarEndereco($request, $cliente);
        $request->validate($this->model->rules(),$this->model->params());

        $cliente->update($request->all());

        return redirect()->route('clientes.index');
    }


    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}
