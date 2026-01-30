<?php

namespace App;


use App\NotificationManager;
use App\Channels\EmailChannel;
use App\Channels\SmsChannel;
use App\Adapter\MockPHPMailerAdapter;
use App\Adapter\NexmoAdapter;
use App\Message\NotificationMessage;

class NotificationService
{
    private const EMAIL = 'email';
    private const SMS   = 'sms';
    private NotificationManager $manager;

    public function __construct()
    {
        $this->manager = new NotificationManager();

        $this->registerChannels();
    }

    private function registerChannels(): void
    {
         $this->manager->register(
            Self::EMAIL,
            new EmailChannel(new MockPHPMailerAdapter())
        );


        $this->manager->register(
            Self::SMS,
            new SmsChannel(new NexmoAdapter())
        );
    }

    // -------------------------
    // Simple APIs (NO STRINGS)
    // -------------------------

    public function sendEmail(NotificationMessage $message): void
    {
        $this->manager->notify(Self::EMAIL, $message);
    }

    public function sendSms(NotificationMessage $message): void
    {
        $this->manager->notify(Self::SMS, $message);
    }

    // -------------------------
    // BULK + PERSONALIZED SMS
    // -------------------------

    public function sendBulkSmsWithNames(
        array $recipients,
        string $template
    ): void {
        foreach ($recipients as $user) {
            $content = str_replace(
                '{{name}}',
                $user['name'],
                $template
            );

            $message = new NotificationMessage(
                to: $user['phone'],
                title: '',
                content: $content
            );

            $this->sendSms($message);
        }
    }
}