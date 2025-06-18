@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Veículo</h1>
    <p><strong>Placa:</strong> {{ $veiculo->placa }}</p>
    <p><strong>Renavam:</strong> {{ $veiculo->renavam }}</p>
    <p><strong>Modelo:</strong> {{ $veiculo->modelo }}</p>
    <p><strong>Marca:</strong> {{ $veiculo->marca }}</p>
    <p><strong>Ano:</strong> {{ $veiculo->ano }}</p>
    <p><strong>Proprietário:</strong> {{ $veiculo->proprietario->name }}</p>

    <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection