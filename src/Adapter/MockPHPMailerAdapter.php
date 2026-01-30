<?php
namespace App\Adapter;
use App\Message\NotificationMessage;

class MockPHPMailerAdapter
{
    public function send(NotificationMessage $message): void
    {
        $mailer = new \MockPHPMailer();
        $recipients = is_array($message->to)
            ? $message->to
            : [$message->to];
        foreach ($recipients as $email) {
            $mailer->addAddress($email);
        }

        $mailer->setSubject($message->title);
        $mailer->setBody($message->content);
        $mailer->send();
    }
}