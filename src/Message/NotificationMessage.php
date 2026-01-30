<?php
namespace App\Message;

class NotificationMessage
{
    public function __construct(
        public string|array $to,
        public string $title,
        public string $content,
        public array $meta = []
    ) {}
}