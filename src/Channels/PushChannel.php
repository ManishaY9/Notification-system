<?php

namespace App\Channels;

use App\Contracts\NotificationChannelInterface;
use App\Message\NotificationMessage;

class PushChannel implements NotificationChannelInterface
{
    private $pushClient;

    public function __construct($pushClient)
    {
        $this->pushClient = $pushClient;
    }

    public function send(NotificationMessage $message): void
    {
        $this->pushClient->send($message);
        
    }
}