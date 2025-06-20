@extends('layouts.app')

@section('title', 'Create') 
@section('content')
<div class="container">
    <h1>Criando novo Veiculo</h1>

    <form action="{{ route('veiculos.store') }}" method="POST">
        @csrf

        <div class="form-group">

            <!--Campo modelo-->
            <label for="modelo">Modelo</label>

            <!--
                error => exibe mensagem se houver erro
                old => coloca o valor 'antigo' no value caso aja erro
                is-invailid => classe bootstap que deixa a borda vermelho caso aja erro;
            -->
            <input type="text" id="modelo" name="modelo" class="form-control @if($errors->has('modelo')) is-invalid @endif" value="{{ old('modelo') }}" placeholder="Digite o modelo" required>
            @if ($errors->has('modelo'))
                <div class="invalid-feedback">{{ $errors->first('modelo') }}</div>
            @endif

            <!--Campo marca-->
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control @if($errors->has('marca')) is-invalid @endif" value="{{ old('marca') }}" placeholder="Digite a marca" required>
            @if ($errors->has('marca'))
                <div class="invalid-feedback">{{ $errors->first('marca') }}</div>
            @endif

            <!--Campo ano-->
            <label for='ano'>Ano</label>
            <input type="text" name="ano" id="ano" class="form-control @if($errors->has('ano')) is-invalid @endif" value="{{ old('ano') }}" placeholder="Digite o ano" required>
            @if ($errors->has('ano'))
                <div class="invalid-feedback">{{ $errors->first('ano') }}</div>
            @endif

            <!--Campo placa-->
            <label for='placa'>Placa</label>
            <input type="text" name="placa" id="placa" class="form-control @if($errors->has('placa')) is-invalid @endif" value="{{ old('placa') }}" placeholder="Digite a placa" required>
            @if ($errors->has('placa'))
                <div class="invalid-feedback">{{ $errors->first('placa') }}</div>
            @endif

            <!--Campo renavam-->
            <label for='renavam'>Renavam</label>
            <input type="text" name="renavam" id="renavam" class="form-control @if($errors->has('renavam')) is-invalid @endif" value="{{ old('renavam') }}" placeholder="Digite o renavam" required>
            @if ($errors->has('renavam'))
                <div class="invalid-feedback">{{ $errors->first('renavam') }}</div>
            @endif

            <!--Campo proprietaio-->
            <label for='proprietario_id'>Proprietário</label>
            <select type="text" name="proprietario_id" id="proprietario_id" class="form-control @if($errors->has('proprietario_id')) is-invalid @endif" required>
                <option value="">Selecione o propiretario</option>  
                    @foreach (\App\User::all() as $user) <!--Percorre o banco de dados instanciando o $user-->
                        <option value="{{ $user->id }}" {{ old('proprietario_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>                
                    @endforeach
            </select>
            
            @if ($errors->has('proprietario_id'))
                <div class="invalid-feedback">{{ $errors->first('proprietario_id') }}</div>
            @endif

            <button type="submit" class="btn btn-success mt-3">Salvar</button>
        </div>
    </form>
</div>
@endsection
