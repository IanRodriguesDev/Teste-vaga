@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Olá {{ Auth::user()->name }}!</h1>
    <h2>Este é o meu teste para a Federal Soluções Técnicas e para a klios!</h2>

    <h3>Ideia principal do projeto</h3>

    <p>Desenvolver uma simples aplicação, com login e nível de acesso simples.</p>
    <p>O administrador do sistema deverá realizar a manutenção dos veículos. Os dados para a tabela de veículos são:</p>

    <ul>
        <li>Placa</li>
        <li>Renavam</li>
        <li>Modelo</li>
        <li>Marca</li>
        <li>Ano</li>    
        <li>Proprietário</li>
    </ul>

    <p>Todas as vezes que um veículo for cadastrado ou editado, deverá ser enviado um e-mail para o proprietário.

        O e-mail do proprietário deverá ser buscado na tabela de usuários.

        O CRUD do veículo deverá ficar em uma área de administração. O proprietário não poderá ter acesso a essa área.

        Deverá haver uma área destinada ao proprietário. O proprietário deverá ser capaz de visualizar todos os seus veículos. Ele não pode editar, excluir ou cadastrar novos veículos, apenas visualizar.</p>
</div>
@endsection