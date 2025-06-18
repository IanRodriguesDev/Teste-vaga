@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criando novo Veiculo</h1>

    <form action="{{  route('veiculos.store')  }}" method="POST">
        @csrf

        <div class="form-group">

            <!--Campo modelo-->
            <label for="modelo">Modelo</label>

            <!--
                error => exibe mensagem se houver erro
                old => coloca o valor 'antigo' no value caso aja erro
                is-invailid => classe bootstap que deixa a borda vermelho caso aja erro;
            -->
            <input type="text" id="modelo" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{  old('modelo')  }}" required>
            @error('modelo')
                <div class="invaild-feedback">{{  $message  }}</div> <!--Menssagem de erro personalizada-->
            @enderror

            <!--Campo marca-->
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{  old('marca')  }}" required>
            @error('marca')
                <div class="invalid-feedback">{{  $mensage  }}</div>
            @enderror

            <!--Campo ano-->
            <label for='ano'>Ano</label>
            <input type="text" name="ano" id="ano" class="form-control @error('ano') is-invalid @enderror" value="{{ old('ano')  }}" requered>
            @error('ano')
                <div class="invaild-feedback">{{  $message  }}</div>    
            @enderror

            <!--Campo placa-->
            <label for='placa'>Placa</label>
            <input type="text" name="placa" id="placa" class="form-control @error('placa') is-invalid @enderror" value="{{ old('placa')  }}" requered>
            @error('placa')
                <div class="invaild-feedback">{{  $message  }}</div>    
            @enderror

            <!--Campo renavam-->
            <label for='renavam'>Renavam</label>
            <input type="text" name="renavam" id="renavam" class="form-control @error('renvam') is-invalid @enderror" value="{{ old('renavam')  }}" requered>
            @error('renavam')
                <div class="invaild-feedback">{{  $message  }}</div>    
            @enderror

            <!--Campo proprietaio-->
            <label for='proprietario_id'>Proprietário</label>
            <select type="text" name="proprietario_id" id="proprietario_id" class="form-control @error('proprietario_id') is-invalid @enderror" value="{{ old('proprietario_id')  }}" requered>
                <option value="">Selecione o propiretário</option>
                    @foreach (\App\Models\User::all() as $user) <!--Percorre o banco de dados instanciando o $user-->
                        <option value="{{  $user->id  }}" {{  old('proprietario_id') == user->id ? 'selected' : ''  }}>
                            {{  $user->name  }} ({{ $user->email }})    
                        </option>                
                    @endforeach
            </select>
            @error('proprietario-id')
                <div class="invaild-feedback">{{  $message  }}</div>    
            @enderror

            <button type="submit" class="btn btn-sucess mt-3">Salvar</button>
        </div>
    </form>
</div>
@endsection
