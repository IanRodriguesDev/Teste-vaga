<?php
//criando o controller 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Veiculo;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //Verificação de login   
    }

    public function index()
    {
        $veiculos = collect();
        
        if (Auth::check()) { // Usa o novo método isAdmin()
            $veiculos = Veiculo::withTrashed()->with('proprietario')->get();
        }

        return view('home', compact('veiculos'));
    }

}
