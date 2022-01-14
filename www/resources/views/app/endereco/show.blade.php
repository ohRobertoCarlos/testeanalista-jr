@extends('app.layouts.main')

@section('title','Endereco')


@section('content')
    <div class="container">
        <form action="{{ route('endereco.destroy', ['id'=> $endereco->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" >Excluir</button>
        </form>
    </div>
@endsection
