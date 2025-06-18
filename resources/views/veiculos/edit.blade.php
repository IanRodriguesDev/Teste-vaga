@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editando Veículo</h1>

    <form method="POST" action="{{ route('veiculos.update', $veiculo) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <!--Campo modelo-->
            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo', $veiculo->modelo) }}" required>
            @error('modelo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!--Campo marca-->
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca', $veiculo->marca) }}" required>
            @error('marca')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!--Campo ano-->
            <label for="ano">Ano</label>
            <input type="number" id="ano" name="ano" class="form-control @error('ano') is-invalid @enderror" value="{{ old('ano', $veiculo->ano) }}" required>
            @error('ano')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!--Campo placa-->
            <label for="placa">Placa</label>
            <input type="text" id="placa" name="placa" class="form-control @error('placa') is-invalid @enderror" value="{{ old('placa', $veiculo->placa) }}" required>
            @error('placa')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!--campo renavam-->
            <label for="renavam">Renavam</label>
            <input type="text" id="renavam" name="renavam" class="form-control @error('renavam') is-invalid @enderror" value="{{ old('renavam', $veiculo->renavam) }}" required>
            @error('renavam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!--Campo proprietário-->
            <label for="proprietario_id">Proprietário</label>
            <select id="proprietario_id" name="proprietario_id"
                class="form-control @error('proprietario_id') is-invalid @enderror" required>
                <option value="">Selecione o proprietário</option>
                @foreach (\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}"
                        {{ old('proprietario_id', $veiculo->proprietario_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('proprietario_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Atualizar</button>
    </form>
</div>
@endsection