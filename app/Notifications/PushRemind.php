<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class PushRemind extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $reminder;
    public function __construct($reminder)
    {
        $this->reminder = $reminder;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail','broadcast',WebPushChannel::class];
        return ['mail',WebPushChannel::class];
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
                    ->view('emails.show-reminder',['reminder'=>$this->reminder]);
    }

    public function toWebPush($notifiable, $notification)
    {
        $title = "Reminder: " . $this->reminder->getShow->title;
        $textBody = "The event begins in 15 minutes on ".$this->reminder->tv."! (" . $this->reminder->formattedTime() . ")";
        return (new WebPushMessage)
            ->title($title)
            ->body($textBody)
            ->action('View account', 'view_account')
            // ->badge()
            // ->dir()
            ->image($this->reminder->getShow->cover_url)
            // ->lang()
            // ->renotify()
            // ->requireInteraction()
            // ->tag()
            ->vibrate([500,110,500,110,450,110,200,110,170,40,450,110,200,110,170,40,500]);
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
