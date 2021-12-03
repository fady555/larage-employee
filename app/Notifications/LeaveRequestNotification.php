<?php

namespace App\Notifications;

use App\LeaveRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveRequestNotification extends Notification
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
        $gen = LeaveRequest::find($this->data->id);

        if($gen->status_request_hr_id == 2 and $gen->status_request_dir_id == 2){
            return (new MailMessage)
                ->line("Your leave request has been approved from the beginning of ".$gen->start." until it expires on ".$gen->end)
                ->line($gen->end."تم الموافقه على طلب الاجازه الخاص بكم من بدايه ".$gen->start." الى ان بنتهى فى ");

        }elseif($gen->status_request_hr_id == 3 or $gen->status_request_dir_id == 3){
            return (new MailMessage)
                ->line("Your leave request has been rejected from the beginning of ".$gen->start." until it expires on ".$gen->end)
                ->line($gen->end."تم الرفض على طلب الاجازه الخاص بكم من بدايه ".$gen->start." الى ان بنتهى فى ");
        }

    }

  public function toDatabase($notifiable)
    {




        $gen = LeaveRequest::find($this->data->id);

        if($gen->status_request_hr_id == 2 and $gen->status_request_dir_id == 2){
            return [
                'id'=>$this->data->id,
                'title_en'=>"Your leave request has been approved from the beginning of ".$gen->start." until it expires on ".$gen->end,
                'title_ar'=>$gen->end."تم الموافقه على طلب الاجازه الخاص بكم من بدايه ".$gen->start." الى ان بنتهى فى ",
                'created_at'=>$this->data->created_at,
            ];

        }elseif($gen->status_request_hr_id == 3 or $gen->status_request_dir_id == 3){
            return [
                'id'=>$this->data->id,
                'title_en'=>"Your leave request has been rejected from the beginning of ".$gen->start." until it expires on ".$gen->end,
                'title_ar'=>$gen->end."تم الرفض على طلب الاجازه الخاص بكم من بدايه ".$gen->start." الى ان بنتهى فى ",
                'created_at'=>$this->data->created_at,
            ];
        }



    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
