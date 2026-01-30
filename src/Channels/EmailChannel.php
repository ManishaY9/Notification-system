<?php

namespace App\Channels;

use App\Contracts\NotificationChannelInterface;
use App\Message\NotificationMessage;
class EmailChannel implements NotificationChannelInterface
{
    private  $mailer;

    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }

   public function send(NotificationMessage $message): void
    {
        $this->mailer->send($message);  
        // Call PHPMailer / SES / SMTP here
    }
}
