@extends('app.layouts.main')

@section('title','Cadastrar Cliente')

@section('content')
    <div class="container mt-5 col-8">
        <h2 class="mb-4">Dados:</h2>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <label class="form-label" for="nome_empresa">Nome Da Empresa</label>
            <input id="nome_empresa" value="{{old('nome_empresa') ?? ''}}" name="nome_empresa" class="form-control m-1" type="text" required="required">
            <p class="text-danger">{{ $errors->has('nome_empresa') ? $errors->first('nome_empresa') : '' }}</p>

            <label class="form-label" for="cnpj">CNPJ</label>
            <input id="cnpj" value="{{old('cnpj') ?? ''}}" name="cnpj" class="form-control m-1" type="text" required="required">
            <p class="text-danger">{{ $errors->has('cnpj') ? $errors->first('cnpj') : '' }}</p>

            <label class="form-label" for="telefone">Telefone</label>
            <input id="telefone" value="{{old('telefone') ?? ''}}" name="telefone" class="form-control m-1" type="text" required="required">
            <p class="text-danger">{{ $errors->has('telefone') ? $errors->first('telefone') : '' }}</p>

            <label class="form-label" for="nome_responsavel">Nome do responsável</label>
            <input id="nome_responsavel" value="{{old('nome_responsavel') ?? ''}}" name="nome_responsavel" class="form-control m-1" type="text" required="required">
            <p class="text-danger">{{ $errors->has('nome_responsavel') ? $errors->first('nome_responsavel') : '' }}</p>

            <label class="form-label" for="email">Email</label>
            <input id="email" value="{{old('email') ?? ''}}" name="email" class="form-control m-1" type="email" required="required">
            <p class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</p>

            <h2 class="my-4">Endereço:</h2>

            <label class="form-label" for="email">CEP</label>
            <input id="cep" name="cep" class="form-control m-1" type="text" placeholder="Digite um CEP válido para preencher o endereço automaticamente" required="required">
            <p class="text-danger">{{ $errors->has('cep') ? $errors->first('cep') : '' }}</p>

            <label class="form-label" for="logradouro">Logradouro</label>
            <input id="logradouro" name="logradouro" class="form-control m-1" type="text" required="required">

            <label class="form-label" for="bairro">Bairro</label>
            <input id="bairro" name="bairro" class="form-control m-1" type="text" required="required">

            <label class="form-label" for="complemento">Complemento</label>
            <input id="complemento" name="complemento" class="form-control m-1" type="text" required="required">

            <label class="form-label" for="numero">Número</label>
            <input id="numero" name="numero" class="form-control m-1" type="text" required="required">

            <label class="form-label" for="cidade">Cidade</label>
            <input id="cidade" name="cidade" class="form-control m-1" type="text" required="required">

            <label class="form-label" for="estado">Estado</label>
            <input id="estado" name="estado" class="form-control m-1" type="text" required="required">

            <button class="btn btn-primary my-3" type="submit">Cadastrar</button>
        </form>


    </div>
@endsection
