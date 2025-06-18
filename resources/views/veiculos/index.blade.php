@extends('layouts.app') <!--Layout padão que já possui o head-->

@section('content') <!--Alimentando o yield presente no layout 'layouts.app'-->
    <!--
        Ultilizando algumas classes herdadas do bootstrap, incluindo algumas estilizações para
        botoes 'btn btn primary'
        formularios 'form-group form-control'
        cerntralização 'container'
        tratamento de erros 'invalid feedback'
    -->
    <div class="container">
        <h1>Lista de Veículos</h1>

        <a href="{{ route('veiculos.create')}}" class="btn btn-primary mb-3">Novo Veículo</a>

        @if($veiculo->isEmpty()) <!--Verificação se existe algum conteudo-->
            <p>Nenhum veiculo cadastrado ainda.</p>
        @else

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Renavam</th>
                    <th>Modelos</th>
                    <th>Marca</th>
                    <th>Ano</th>
                    <th>Placa</th>
                    <th>Proprietário</th>
                    <th>Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($veiculos as $veiculos) <!--Foreach para formar e preencher a tabela com os carros -->
                <tr>
                    <td>{{ $veiculo->id  }}</td>
                    <td>{{ $veiculo->renavams  }}</td>
                    <td>{{ $veiculo->modelo  }}</td>
                    <td>{{ $veiculo->marca  }}</td>
                    <td>{{ $veiculo->ano  }}</td>
                    <td>{{ $veiculo->placa  }}</td>
                    <td>{{ $veiculo->proprietario->nome  }}</td>
                    <td>
                        <a href="{{ route('veiculos.show', $veiculo->id) }}" class="btn btn-info btn-sm">ver</a>
                        <a href="{{ route('veiculos.edit', $veiculo->id)  }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('veiculos.destroy', $veiculo->id)}}" method="POST" style="display:inline-block;">
                            @csrf <!--Proteção contra ataques-->
                            @method('DELETE')
                            <button type="submit" onclick="return corfirm('confirmar a exclusão') class='btn btn-danger btn-sm'">Excluir</button>                            
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
