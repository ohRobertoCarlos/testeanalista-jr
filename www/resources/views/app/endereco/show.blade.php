@extends('app.layouts.main')

@section('title','Endereco')


@section('content')
    <div class="container">
        <div>
            <p>Cep: <span class="font-weight-bold" >{{$endereco->cep}}</span></p>
            <p>Logradouro: <span class="font-weight-bold" >{{$endereco->logradouro}}</span></p>
            <p>Bairro: <span class="font-weight-bold" >{{$endereco->bairro}}</span></p>
            <p>cidade: <span class="font-weight-bold" >{{$endereco->cidade}}</span></p>
            <p>Estado: <span class="font-weight-bold" >{{$endereco->estado}}</span></p>
            <p>Numero: <span class="font-weight-bold" >{{$endereco->numero}}</span></p>
        </div>
        <form action="{{ route('endereco.destroy', ['id'=> $endereco->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" >Excluir</button>
            <a href="{{ route('endereco.edit', ['id' => $endereco->id]) }}" class="btn btn-primary dp-inline" >Editar</a>
        </form>


    </div>
@endsection
