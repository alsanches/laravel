@extends('templates.template')

@section('content')


    <div class="top-header">
        <h1 class="titulo">Novo Produto</h1>
        <a href="{{url("/produtos")}}" class="btn btn-primary">
            <i class="glyphicon glyphicon-menu-left"></i> Retornar
        </a>
    </div>

    <form class="form" action="/produtos" method="post">

        <div class="form-group">
            <input type="text" name="cod" placeholder="Insira o Código" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="nome" placeholder="Insira o nome" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="enviar" value="Salvar" class="btn btn-success">
        </div>

        {{csrf_field()}}
    </form>

    @if( isset($errors) && count($errors) > 0)

        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <ul>
                    <li>{{$error}}</li>
                </ul>
            @endforeach
        </div>

    @endif

@endsection