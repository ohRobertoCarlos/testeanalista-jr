@extends('app.layouts.main')

@section('title','Editar Cliente')

@section('content')
    <div class="container mt-5 col-8">
        <h2 class="mb-4">Cadastrar Cliente</h2>

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



            <button class="btn btn-primary mt-3" type="submit">Editar</button>
        </form>
    </div>
@endsection
