<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReceiveMailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $replyToMail;
    public $mailSubject;
    public $mailContent;
    public function __construct($replyToMail, $mailSubject, $mailContent)
    {
        $this->replyToMail = $replyToMail;
        $this->mailSubject = $mailSubject;
        $this->mailContent = $mailContent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Your profile has received a new email')
                    ->replyTo($this->replyToMail)
                    ->line('You have received an email from your profile.')
                    ->line('Sender email : '.$this->replyToMail)
                    ->line('Subject : '.$this->mailSubject)
                    ->line('Content : '.$this->mailContent)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
