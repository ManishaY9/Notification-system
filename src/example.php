<?php

declare(strict_types=1);

// ------------------------------------
// Load Composer autoload
// ------------------------------------
require_once __DIR__ . '/../vendor/autoload.php';
// ------------------------------------
// Imports
// ------------------------------------
use App\NotificationService;
use App\Message\NotificationMessage;

// ------------------------------------
// 1. Create NotificationService
// ------------------------------------
$notifications = new NotificationService();

// ------------------------------------
// 2. Send SINGLE EMAIL
// ------------------------------------
$notifications->sendEmail(
    new NotificationMessage(
        'user@example.com',
        'Welcome',
        'Thanks for signing up!'
    )
);

// ------------------------------------
// 3. Send SINGLE SMS
// ------------------------------------
$notifications->sendSms(
    new NotificationMessage(
        '+919999999999',
        '',
        'Your OTP is 123456'
    )
);

// ------------------------------------
// 4. BULK + PERSONALIZED SMS
// ------------------------------------
$users = [
    ['name' => 'Manisha', 'phone' => '+919999999991'],
    ['name' => 'Rahul',   'phone' => '+919999999992'],
    ['name' => 'Anita',   'phone' => '+919999999993'],
];

$template = 'Hi {{name}}, your OTP is 987654';

$notifications->sendBulkSmsWithNames($users, $template);