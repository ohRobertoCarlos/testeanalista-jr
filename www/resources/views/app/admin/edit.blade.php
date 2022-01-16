@extends('app.layouts.main')

@section('title', 'Editar Usuário')

@section('content')
    <div class="container my-5">
        <h2>Editar Usuário:</h2>

        <form method="POST" action="{{ route('admin.update', ['id' => $user->id]) }}">
            @csrf
            @method('PUT')

                <label class="form-label" for="email">Nome</label>
                <input value="{{ $user->name ?? old('name') }}" id="name" name="nome" class="form-control m-1" type="text">
                <p class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</p>

                <label class="form-label" for="logradouro">Email</label>
                <input value="{{ $user->email ?? old('email') }}" id="email" name="email" class="form-control m-1" type="email">

                <label class="form-label" for="perfil">Perfil</label>
                <select class="custom-select" name="perfil" id="perfil">
                    <option>Selecione um Perfil</option>

                    @foreach ($perfis as $nomePerfil => $perfil)
                        <option value="{{ $perfil }}" {{$user->perfil == $perfil ? 'selected' : ''}}>{{ucfirst($nomePerfil)}}</option>
                    @endforeach

                </select>

                <label class="form-label" for="nova_senha">Nova Senha</label>
                <input id="nova_senha" name="password" class="form-control m-1" type="password" placeholder="Opcional">

                <button class="btn btn-primary mt-3" type="submit">Salvar</button>

        </form>
    </div>
@endsection
