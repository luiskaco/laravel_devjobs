<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;
    private $vacante;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante)
    {
        $this->vacante = $vacante;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // database -> creas el mtodo toDatabase

        // Diferente notificaciones
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
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es: '. $this->vacante->titulo)
                    ->action('Notification Action', url('/'))
                    ->line('Gracias por utilizar devjob');
    }

    // Notifiacaciones en la base de datos
    public function toDatabase($notifiable)
    {
        return [
            'vacante' => $this->vacante->titulo,
            'vacante_id' => $this->vacante->id
        ]; // se conoce  omo data
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
            //  Como se veria en un arreglo
        ];
    }
}
