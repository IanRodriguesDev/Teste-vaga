<?php

namespace App\Notifications;

use App\Veiculo;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VeiculoNotificacao extends Notification
{
    use Queueable;

    public $veiculo;
    public $proprietarioNome;

    public function __construct(Veiculo $veiculo, $proprietarioNome)
    {
        $this->veiculo = $veiculo;
        $this->proprietarioNome = $proprietarioNome;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Seu veículo foi cadastrado ou atualizado')
            ->greeting('Olá, ' . $this->proprietarioNome)
            ->line('Um veículo de sua propriedade foi registrado ou atualizado:')
            ->line('Modelo: ' . $this->veiculo->modelo)
            ->line('Placa: ' . $this->veiculo->placa)
            ->action('Ver veículo', route('veiculos.show', $this->veiculo->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
