@extends('app.layouts.main')

@section('title','Editar Cliente')

@section('content')
    <div class="container mt-5 col-8">
        <h2>Dados do cliente:</h2>

        <div class="mb-5">
            <form action="{{ route('clientes.update', ['id' => $cliente->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label class="form-label" for="nome_empresa">Nome Da Empresa</label>
                <input id="nome_empresa" value="{{$cliente->nome_empresa ?? old('nome_empresa')}}" name="nome_empresa" class="form-control m-1" type="text" required="required">
                <p class="text-danger">{{ $errors->has('nome_empresa') ? $errors->first('nome_empresa') : '' }}</p>

                <label class="form-label" for="cnpj">CNPJ</label>
                <input id="cnpj" value="{{$cliente->cnpj ?? old('cnpj')}}" name="cnpj" class="form-control m-1" type="text" required="required">
                <p class="text-danger">{{ $errors->has('cnpj') ? $errors->first('cnpj') : '' }}</p>

                <label class="form-label" for="telefone">Telefone</label>
                <input id="telefone" value="{{$cliente->telefone ?? old('telefone')}}" name="telefone" class="form-control m-1" type="text" required="required">
                <p class="text-danger">{{ $errors->has('telefone') ? $errors->first('telefone') : '' }}</p>

                <label class="form-label" for="nome_responsavel">Nome do responsável</label>
                <input id="nome_responsavel" value="{{$cliente->nome_responsavel ?? old('nome_responsavel')}}" name="nome_responsavel" class="form-control m-1" type="text" required="required">
                <p class="text-danger">{{ $errors->has('nome_responsavel') ? $errors->first('nome_responsavel') : '' }}</p>

                <label class="form-label" for="email">Email</label>
                <input id="email" value="{{$cliente->email ?? old('email')}}" name="email" class="form-control m-1" type="email" required="required">
                <p class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</p>

                <hr>

                <h2 class="my-4">Endereço(s) do Cliente</h2>
                    <table id="table">
                        <thead>
                            <tr>
                                <th>Endereço Principal (Check)</th>
                                <th>ID</th>
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>logradouro</th>
                                <th>Bairro</th>
                                <th>Complemento</th>
                                <th>Estado</th>
                                <th>Número</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($cliente->enderecos) == 0)
                                <tr>
                                    <td class="text-center font-weight-bold" colspan="8">Não há Endereços cadastrados</td>
                                </tr>
                            @endif

                            @foreach ($cliente->enderecos as $endereco)

                            <tr>
                                <td>
                                    <input value="{{ $endereco->id }}" type="radio" class="align-center" name="principal" {{$endereco->principal == 1 ? 'checked' : ''}}>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="text-danger font-weight-bold">{{ $errors->has('principal') ? $errors->first('principal') : '' }}</p>

                    <hr>

                <h3 class="my-4">Criar Novo Endereço: (OPCIONAl)</h3>

                <label class="form-label" for="email">CEP</label>
                <input id="cep" name="cep" class="form-control m-1" type="text" placeholder="Digite um CEP válido para preencher o endereço automaticamente">
                <p class="text-danger">{{ $errors->has('cep') ? $errors->first('cep') : '' }}</p>

                <label class="form-label" for="logradouro">Logradouro</label>
                <input id="logradouro" name="logradouro" class="form-control m-1" type="text">

                <label class="form-label" for="bairro">Bairro</label>
                <input id="bairro" name="bairro" class="form-control m-1" type="text">

                <label class="form-label" for="complemento">Complemento</label>
                <input id="complemento" name="complemento" class="form-control m-1" type="text">

                <label class="form-label" for="numero">Número</label>
                <input id="numero" name="numero" class="form-control m-1" type="text">

                <label class="form-label" for="cidade">Cidade</label>
                <input id="cidade" name="cidade" class="form-control m-1" type="text">

                <label class="form-label" for="estado">Estado</label>
                <input id="estado" name="estado" class="form-control m-1" type="text">

                <button class="btn btn-primary mt-3" type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection
