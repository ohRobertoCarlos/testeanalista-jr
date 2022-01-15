@extends('app.layouts.main')

@section('title', 'Área administrativa')

@section('content')
    <div class="container">
        <a href="{{ route('admin.register') }}" class="btn btn-success m-4">
            Criar Usuario
        </a>

        <h2 class="mb-4">Usuarios:</h2>

        <table id="table" class="display">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>#</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->perfil}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.edit', ['id' => $user->id]) }}">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="#">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
