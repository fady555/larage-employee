<?php

namespace App\Notifications;

use App\Employee;
use App\General;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
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
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $gen = General::find($this->data->id);
        return (new MailMessage)
                    ->action(trans('app.show'), url('/show-notifications'))
                    ->line($gen->description_en)
                    ->line($gen->description_ar);

    }

    public function toDatabase(){
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
