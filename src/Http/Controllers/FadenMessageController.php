<?php

namespace Faden\FadenMessageModule\Controllers;

use Alive2212\LaravelSmartRestful\SmartCrudController;
use App\FadenMessage;

use Faden\FadenMessageModule\Notifications\MailNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;


class FadenMessageController extends SmartCrudController
{
    public function initController()
    {
        $this->model  = new FadenMessage();
    }

    public function send($message)
    {
        $data = [
            'message_type' => 'email',
            'body' => "User Created",
            'title' =>'title',
            'to' =>'ali.salimiansas2@gmial.com',
            'author_id'  => 1,
            'priority' =>  "immediately",
            'sent_at' => time() ,
        ];
        $message = FadenMessage::create($data);

        Notification::route('mail', $message->to)->notify( new MailNotification($message));
    }
}
