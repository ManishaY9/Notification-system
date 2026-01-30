<?php

namespace Tests\Fakes;

use App\Message\NotificationMessage;

class FakeClient
{
    public bool $called = false;
    public ?NotificationMessage $message = null;

    public function send(NotificationMessage $message): void
    {
        $this->called = true;
        $this->message = $message;
    }
}