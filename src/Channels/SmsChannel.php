<?php

namespace App\Channels;

use App\Contracts\NotificationChannelInterface;
use App\Message\NotificationMessage;

class SmsChannel implements NotificationChannelInterface
{
    private  $client;

    public function __construct($client)
    {
        $this->client = $client;
    }


    public function send(NotificationMessage $message): void
    {
        $this->client->send($message);
    }

}
