@extends('layout.principal')

@section('conteudo')

    @if(empty($produtos))
        <div>Você não tem nenhum produto cadastrado.</div>
    @else
        <h1>Listagem de produtos</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
            <tr  class={{ $p->quantidade <= 1 ? "bg-danger" : ""}}>
                <td> {{ $p->nome }} </td>
                <td> {{ $p->valor }} </td>
                <td> {{ $p->descricao }} </td>
                <td> {{ $p->quantidade }} </td>
                <td>
                    <a href="/produtos/mostra/{{$p->id}}">
                        <span class="fas fa-search"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
    <h4>
        <span class="text text-danger pull-right">
            Um ou menos itens no estoque
        </span>
    </h4>
@stop