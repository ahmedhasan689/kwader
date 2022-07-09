<?php

namespace App\Notifications;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobAcceptNotification extends Notification
{
    use Queueable;

    /**
     * @var \App\Models\Job
     */
    protected $job;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = ['database', 'broadcast'];

        return $via;
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'إشعار جديد',
            'body' =>  'تم الموافقة على إعلان الوظيفة بالمسمى الوظيفي ' . $this->job->job_title,
            'icon' => asset('Dashboard_Assets/img/accept.png'),
            'url' => env('APP_URL'). '/employer/job/create/3',
            'time' => Carbon::now()->diffForHumans(),
        ];
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            'title' => 'إشعار جديد',
            'body' =>  'تم الموافقة على إعلان الوظيفة بالمسمى الوظيفي ' . $this->job->job_title,
            'icon' => asset('Dashboard_Assets/img/accept.png'),
            'url' => env('APP_URL'). '/employer/job/create/3',
            'time' => Carbon::now()->diffForHumans(),
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
