@extends('templates.template')

@section('content')


    <div class="top-header">
        <h1 class="titulo">Deletar Produto - {{$produto->nome}}</h1>
        <a href="{{url("/produtos")}}" class="btn btn-primary">
            <i class="glyphicon glyphicon-menu-left"></i> Retornar
        </a>
    </div>

    <div>
        <b>Código: </b> {{$produto->cod}} <br>
        <b>Nome  : </b> {{$produto->nome}} <br>

    </div>

    <form class="form" action="/produtos/{{$produto->id}}" method="post">
        <input name="_method" value="DELETE" type="hidden">
        {{csrf_field()}}


        <div class="form-group">
            <input type="submit" name="enviar" value="Deletar" class="btn btn-danger">
        </div>

    </form>



@endsection