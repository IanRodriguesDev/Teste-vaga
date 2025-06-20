<?php

namespace App\Http\Controllers;

use App\Veiculo;
use App\Http\Requests\VeiculoRequest;
use App\Events\VeiculoCadastradoOuAtualizado;
use App\Http\Controllers\redirect;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Auth;

class VeiculoController extends Controller
{
    //Visualizar os veiculos
    public function index() 
    {
        $veiculos = Veiculo::all(); //Busca os veiculos, inclusive os deletados
        return view('veiculos.index', compact('veiculos')); //Retornando a view para a lista de veiculos
    }

    //Criar os veiculos
    public function create()
    {
        return view('veiculos.create'); //retorna para a pagina de criação dos veiculos
    }

    //Armazenando novo veiculo
    public function store(VeiculoRequest $request)
    {

        $dados = $request->validated(); //Retornará somente os que passarem na rules
        $veiculo = Veiculo::create($dados); //Pega os dados 'limpos' e cria o objeto veiculo com a função create 

        event(new VeiculoCadastradoOuAtualizado($veiculo)); //Disparo do evento

        return redirect()->route('veiculos.index')->with('sucesso', 'veiculo cadastrado com sucesso'); //Redireciona para as view da lista de veiculos
    }

    //Tela de edição
    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit', compact('veiculo'));
    }  

    //Atualização de dados do veiculo
    public function update(VeiculoRequest $request, Veiculo $veiculo)
    {
        $dados = $request->validated();

        $veiculo->update($dados);

        event(new VeiculoCadastradoOuAtualizado($veiculo));

        return redirect()->route('veiculos.index')->with('sucesso', 'veiculo atualizado com sucesso.');
    }

    //Deletando um veiculo
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->route('veiculos.index');
    }

    //Visualização do usuario
    public function meus()
    {
        $veiculos = Veiculo::where('proprietario_id', Auth::id())->get();
        return view('veiculos.meus', compact('veiculos'));
    }
}
