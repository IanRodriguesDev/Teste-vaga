@extends('layouts.app')

@section('title', 'Edit')
@section('content')
<div class="container">
    <h1>Editando Veículo</h1>

    <form method="POST" action="{{ route('veiculos.update', $veiculo) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <!--Campo modelo-->
            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control @if ($errors->has('modelo')) is-invalid @endif" value="{{ old('modelo', $veiculo->modelo ?? '') }}" required>
            @if ($errors->has('modelo'))
                <div class="invalid-feedback">{{ $errors->first('modelo') }}</div>
            @endif

            <!--Campo marca-->
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control @if ($errors->has('marca')) is-invalid @endif" value="{{ old('marca', $veiculo->marca ?? '') }}" required>
            @if ($errors->has('marca'))
                <div class="invalid-feedback">{{ $errors->first('marca') }}</div>
            @endif

            <!--Campo ano-->
            <label for="ano">Ano</label>
            <input type="text" id="ano" name="ano" class="form-control @if ($errors->has('ano')) is-invalid @endif" value="{{ old('ano', $veiculo->ano ?? '') }}" required>
            @if ($errors->has('ano'))
                <div class="invalid-feedback">{{ $errors->first('ano') }}</div>
            @endif

            <!--Campo placa-->
            <label for="placa">Placa</label>
            <input type="text" id="placa" name="placa" class="form-control @if ($errors->has('placa')) is-invalid @endif" value="{{ old('placa', $veiculo->placa ?? '') }}" required>
            @if ($errors->has('placa'))
                <div class="invalid-feedback">{{ $errors->first('placa') }}</div>
            @endif

            <!--campo renavam-->
            <label for="renavam">Renavam</label>
            <input type="text" id="renavam" name="renavam" class="form-control @if ($errors->has('renavam')) is-invalid @endif" value="{{ old('renavam', $veiculo->renavam ?? '') }}" required>
            @if ($errors->has('renavam'))
                <div class="invalid-feedback">{{ $errors->first('renavam') }}</div>
            @endif

            <!--Campo proprietário-->
            <label for="proprietario_id">Proprietário</label>
            <select id="proprietario_id" name="proprietario_id" class="form-control @if ($errors->has('proprietario_id')) is-invalid @endif" required>
                <option value="">Selecione o proprietário</option>
                @foreach (\App\User::all() as $user)
                    <option value="{{ $user->id }}"
                        {{ old('proprietario_id', $veiculo->proprietario_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @if ($errors->has('proprietario_id'))
                <div class="invalid-feedback">{{ $errors->first('proprietario_id') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
</div>
@endsection