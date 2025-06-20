@extends('layouts.app')


@section('title', 'Meus Veiculos')
@section('content')
<div class="container">
    <h1>Meus Veículos</h1>

    @if ($veiculos->isEmpty())
        <p>Você não possui veículos cadastrados.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Renavam</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Ano</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($veiculos as $veiculo)
                    <tr>
                        <td>{{ $veiculo->placa }}</td>
                        <td>{{ $veiculo->renavam }}</td>
                        <td>{{ $veiculo->modelo }}</td>
                        <td>{{ $veiculo->marca }}</td>
                        <td>{{ $veiculo->ano }}</td>
                        <td>
                            <a href="{{ route('veiculos.show', $veiculo->id) }}" class="btn btn-info btn-sm">ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection