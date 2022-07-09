<?php

namespace App\Notifications;

use App\Models\Employee;
use App\Models\Employer;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateContractNotification extends Notification
{
    use Queueable;

    protected $job;
    protected $employer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Job $job, Employer $employer)
    {
        $this->job = $job;
        $this->employer = $employer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
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

    public function toDatabase($notifiable)
    {
        return [
            'body' => $this->employer->user->first_name . 'أرسل إليك عقد عمل',
            'show' => route('contract.show'),
            'accept_link' => route('contract.update', ['id' => $this->job->id]),
            'cancel_link' => route('contract.delete', ['id' => $this->job->id]),
            'job' => $this->job->job_title,
            'time' => Carbon::now(),
            'type' => 'Create',
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
