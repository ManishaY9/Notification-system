<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Channels\SmsChannel;
use App\Message\NotificationMessage;
use Tests\Fakes\FakeClient;

class SmsChannelTest extends TestCase
{
    public function test_sms_channel_sends_message(): void
    {
        $fakeClient = new FakeClient();
        $channel = new SmsChannel($fakeClient);

        $message = new NotificationMessage(
            '+919999999999',
            '',
            'OTP: 123456'
        );

        $channel->send($message);

        $this->assertTrue($fakeClient->called);
        $this->assertSame($message, $fakeClient->message);
    }
}