<?php

namespace App\Listeners;

use App\Notifications\VeiculoNotificacao;
use Illuminate\Support\Facades\Notification;
use App\Events\VeiculoCadastradoOuAtualizado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarNotificacaoProprietario
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  VeiculoCadastroOuAtualizado  $event
     * @return void
     */
    public function handle(VeiculoCadastradoOuAtualizado $event)
    {
        $proprietario = $event->veiculo->proprietario;
        Notification::route('mail', $proprietario->email) ->notify(new VeiculoNotificacao($event->veiculo));
    }
}
