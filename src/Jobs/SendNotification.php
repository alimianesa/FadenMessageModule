<?php

namespace App\Jobs;

use App\Notifications\MailNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    public function __construct($event)
    {
        $this->message = $event->message;
    }


    public function handle()
    {
        $type = $this->message->message_type;

        if ($type == 'push'){
            $this->pushMessage($this->message);
        }
        elseif ($type == 'email'){
            Notification::route('mail', $this->message->to)->notify( new MailNotification($this->message));
        }
    }


    public function pushMessage($message)
    {
        Http::withHeaders([
            'Authorization' => 'key=AAAApw-yf2U:APA91bE_baOttqXzE7q39jozuBIwSBChFNwKtx0U7TuloyAQJiuvJO1K7gmBPpK8qjKp12mBufpK8I2ndQug8Emzq-BJUcHYSNCKK3To4Uy0D2B6IMbOnJizhDGEw5tnS6yb4sNLDOjP',
            'Content-Type' => 'application/json'
        ])->post('https://fcm.googleapis.com/fcm/send', [
            "to" => $message->to,
            "notification" => [
                'body' => $message->push_body,
                'title' => $message->push_title
            ]
        ]);
    }
}
