@extends('app.layouts.main')

@section('title', 'Endereços')

@section('content')
    <div class="container">
        <h2 class="my-4">Endereço(s) do Cliente</h2>
            <table id="table">
                <thead>
                    <tr>
                        <th>Endereço Principal</th>
                        <th>ID</th>
                        <th>CEP</th>
                        <th>Cidade</th>
                        <th>logradouro</th>
                        <th>Bairro</th>
                        <th>Complemento</th>
                        <th>Estado</th>
                        <th>Número</th>
                        <th>#</th>
                        <th>#</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>

                    @if (count($enderecos) == 0)
                        <tr>
                            <td class="text-center font-weight-bold" colspan="8">Não há Endereços cadastrados</td>
                        </tr>
                    @endif

                    @foreach ($enderecos as $endereco)

                    <tr>
                        <td>
                            {{$endereco->principal == 1 ? 'Sim' : 'Não'}}
                        </td>
                        <td>{{ $endereco->id }}</td>
                        <td>{{ $endereco->cep }}</td>
                        <td>{{ $endereco->cidade }}</td>
                        <td>{{ $endereco->logradouro }}</td>
                        <td>{{ $endereco->bairro }}</td>
                        <td>{{ $endereco->complemento }}</td>
                        <td>{{ $endereco->estado }}</td>
                        <td>{{ $endereco->numero }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('endereco.show', ['id' => $endereco->id]) }}">Ver</a></td>
                        </td>
                        <td>
                            <a href="{{ route('endereco.edit', ['id' => $endereco->id]) }}" class="btn btn-primary dp-inline" >Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('endereco.destroy', ['id'=> $endereco->id]) }}" method="POST">
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
