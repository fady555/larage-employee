<?php

namespace App\Notifications;

use App\EventAndEffects;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PhpParser\Node\Stmt\Else_;

class EventEffectNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {

        if(env('SEND_EMI_WITH_DATABASE_NOTIFICATION',false) == 1):
            return ['mail','database'];
        else:
            return ['database'];
        endif;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $gen = EventAndEffects::find($this->data->id);
        return (new MailMessage)

                    ->action(trans('app.show'), url('/show-notifications'))
                    ->line($gen->description_en)
                    ->line($gen->description_ar);

    }

    public function toDatabase($notifiable)
    {

        return [
            'id'=>$this->data->id,
            'title_en'=>$this->data->title_en,
            'title_ar'=>$this->data->title_ar,
            'created_at'=>$this->data->created_at,
        ];


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
