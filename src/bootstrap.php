<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';


// --------------------------------------------------
// Imports
// --------------------------------------------------
use App\NotificationManager;
use App\Channels\EmailChannel;
use App\Channels\SmsChannel;
use App\Adapter\MockPHPMailerAdapter;
use App\Adapter\NexmoAdapter;
use App\Message\NotificationMessage;
$manager = new NotificationManager();

$emailProvider = new EmailChannel(
    new MockPHPMailerAdapter()
);

$manager->register( 'email', $emailProvider);
$smsProvider = new SmsChannel(
    new NexmoAdapter()
);

$manager->register( 'sms', $smsProvider);

$message = new NotificationMessage(
    to: 'user@example.com',
    title: 'Welcome',
    content: 'Thanks for signing up!'
);
$manager->notify('email', $message);

$smsMessage = new NotificationMessage(
    to: '+919999999999',
    title: '',
    content: 'Your OTP is 123456'
);

$manager->notify('sms', $smsMessage);