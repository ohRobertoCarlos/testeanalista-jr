@extends('app.layouts.main')

@section('title', 'Editar Endereço')

@section('content')
    <div class="container my-5">
        <h2>Editar Endereço:</h2>

        <form method="POST" action="{{ route('endereco.update', ['id' => $endereco->id]) }}">
            @csrf
            @method('PUT')

            <label class="form-label" for="email">CEP</label>
                <input value="{{ $endereco->cep ?? old('cep') }}" id="cep" name="cep" class="form-control m-1" type="text" placeholder="Digite um CEP válido para preencher o endereço automaticamente">
                <p class="text-danger">{{ $errors->has('cep') ? $errors->first('cep') : '' }}</p>

                <label class="form-label" for="logradouro">Logradouro</label>
                <input value="{{ $endereco->logradouro ?? old('logradouro') }}" id="logradouro" name="logradouro" class="form-control m-1" type="text">

                <label class="form-label" for="bairro">Bairro</label>
                <input value="{{ $endereco->bairro ?? old('bairro') }}" id="bairro" name="bairro" class="form-control m-1" type="text">

                <label class="form-label" for="complemento">Complemento</label>
                <input value="{{ $endereco->complemento ?? old('complemento') }}" id="complemento" name="complemento" class="form-control m-1" type="text">

                <label class="form-label" for="numero">Número</label>
                <input value="{{ $endereco->numero ?? old('numero') }}" id="numero" name="numero" class="form-control m-1" type="text">

                <label class="form-label" for="cidade">Cidade</label>
                <input value="{{ $endereco->cidade ?? old('cidade') }}" id="cidade" name="cidade" class="form-control m-1" type="text">

                <label class="form-label" for="estado">Estado</label>
                <input value="{{ $endereco->estado ?? old('estado') }}" id="estado" name="estado" class="form-control m-1" type="text">

                <label class="form-label" for="perfil">Endereço principal ?</label>
                <select class="custom-select" name="principal" id="principal">
                    <option>-- Selecione --</option>
                    @switch($endereco->principal)
                        @case(1)
                            <option value="0">Não</option>
                            <option value="1" selected>Sim</option>
                            @break
                        @default
                            <option value="0" selected>Não</option>
                            <option value="1">Sim</option>
                    @endswitch
                </select>

                <button class="btn btn-primary mt-3" type="submit">Salvar</button>

        </form>
    </div>
@endsection
