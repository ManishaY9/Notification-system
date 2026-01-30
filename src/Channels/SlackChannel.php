<?php

namespace App\Channels;

use App\Contracts\NotificationChannelInterface;
use App\Message\NotificationMessage;

class SlackChannel implements NotificationChannelInterface
{
    private $slackClient;

    public function __construct($slackClient)
    {
        $this->slackClient = $slackClient;
    }

    public function send(NotificationMessage $message): void
    {
        $this->slackClient->send($message);
       
    }
}