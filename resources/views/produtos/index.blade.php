@extends('templates.template')

@section('content')
<div class="top-header">
    <h1 class="titulo">Listagem de Produtos</h1>
    <a href="{{url("/produtos/create")}}" class="btn btn-success">
    <i class="glyphicon glyphicon-plus"></i> Cadastrar Produto
    </a>
</div>

    <table class="table table-bordered table-hover table-responsive">
        <tr>
            <th>
                Código
            </th>
            <th>
                Produto
            </th>
            <th>
                Ações
            </th>
        </tr>
        @forelse($produtos as $produto)
            <tr>
                <td>
                    {{$produto->cod}}
                </td>
                <td>
                    {{$produto->nome}}
                </td>
                <td>
                    <a href="{{url("/produtos/$produto->id/edit")}}" class="edit">
                        <i class="glyphicon  glyphicon-pencil"></i>
                    </a> |
                    <a href="{{url("/produtos/$produto->id")}}"class="delete">
                        <i class="glyphicon  glyphicon-trash"></i>
                    </a>
                </td>


            </tr>
        @empty
            <tr>
                <td colspan="3">
                    Nenhum registro encontrado
                </td>
            </tr>

        @endforelse


    </table>

    {!! $produtos->links() !!}

@endsection

