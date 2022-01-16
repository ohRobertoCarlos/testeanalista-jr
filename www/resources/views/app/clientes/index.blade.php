@extends('app.layouts.main')

@section('title', 'Clientes')

@section('content')

<div class="container">
   <a href="{{ route('clientes.create') }}" class="btn btn-success m-3">Cadastrar Cliente</a>
   <hr>

   <h2 class="mb-4">Clientes:</h2>

    <table id="table" class="display">
        <thead>
            <tr>
                <th>Nome Da Empresa</th>
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Nome do responsável</th>
                <th>Email</th>
                <th>Todos Endereços</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>

        <tbody>
            @if (count($clientes) == 0)
                <tr>
                    <td class="text-center font-weight-bold" colspan="8">Não há clientes cadastrados</td>
                </tr>
            @endif

            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome_empresa }}</td>
                    <td>{{ $cliente->cnpj }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->nome_responsavel }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('endereco.index', ['cliente_id' => $cliente->id]) }}">Endereços</a>
                    </td>
                    <td><a class="btn btn-primary" href="{{ route('clientes.edit',['id' => $cliente->id]) }}">editar</a></td>
                    <td>
                        <form method="POST" action="{{ route('clientes.destroy', ['id' => $cliente->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
