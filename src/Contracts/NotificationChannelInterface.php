<?php

namespace App\Contracts;
use App\Message\NotificationMessage;
/**
 * Interface NotificationChannelInterface
 * 
 * Defines the contract for all notification channels.
 * Any class implementing this interface can be used as a notification channel.
 */
interface NotificationChannelInterface
{

    public function send(NotificationMessage $message): void;


}
