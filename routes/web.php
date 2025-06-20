<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'as'=>'admin.'], function () {
    //Authentication Rotes
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    //Password Reset
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/home', 'HomeController@index')->name('home');
});

 // Criando as rotas para os veiculos
Route::middleware(['auth'])->group(function() { // Exigindo que o usuario esteja logado.

    // Acesso apenas para administradores.
Route::middleware('is_admin')->group(function(){
    
    Route::get('/veiculos/create', [VeiculoController::class, 'create'])->name('veiculos.create'); // Cria veiculos
    Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store'); // Salva os dados do veiculo
    Route::get('/veiculos/{veiculo}/edit', [VeiculoController::class, 'edit'])->name('veiculos.edit'); // Mostra o formulario de edição dos dados do veiculo
    Route::put('veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update'); // Atualiza o veiculo com os dados do formularios
    Route::delete('veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy'); // Destroi um veiculo.
    Route::get('veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');

});
 
    Route::get('/meus-veiculos', [VeiculoController::class, 'meus'])->name('veiculos.meus'); // Rota para o proprietário ver apenas os seus veículos
    Route::get('veiculos/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show'); // Rota para exibir veiculo especifico    
});


