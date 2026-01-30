<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Channels\EmailChannel;
use App\Message\NotificationMessage;
use Tests\Fakes\FakeClient;

class EmailChannelTest extends TestCase
{
    public function test_email_channel_sends_message(): void
    {
        $fakeClient = new FakeClient();
        $channel = new EmailChannel($fakeClient);

        $message = new NotificationMessage(
            'user@example.com',
            'Test Email',
            'Hello Email'
        );

        $channel->send($message);

        $this->assertTrue($fakeClient->called);
        $this->assertSame($message, $fakeClient->message);
    }
    
}