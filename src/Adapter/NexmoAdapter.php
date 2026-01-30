<?php

namespace App\Adapter;

use App\Message\NotificationMessage;
/**
 * Class NexmoProvider
 * 
 */
class NexmoAdapter
{
     public function send(NotificationMessage $message): void
    {
        $recipients = is_array($message->to)
            ? $message->to
            : [$message->to];
        
        $body = $message->content;

        $from = $message->meta['from'] ?? '+10000000000';
        foreach ($recipients as $to) {
            // Example (pseudo-code)
            // $nexmoClient->message()->send([
            //     'to'   => $to,
            //     'from' => $from,
            //     'text' => $body,
            // ]);
        }
      
    }
}
