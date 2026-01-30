<?php

    namespace App;

    use App\Contracts\NotificationChannelInterface;
    use App\Message\NotificationMessage;
    use InvalidArgumentException;

    /**
     * Class NotificationManager
     * 
     */
    class NotificationManager
    {
        private array $channels = [];
       
        public function register(string $channelName, NotificationChannelInterface $handler): void
        {
            $this->channels[$channelName] = $handler;
        }

       public function notify(string $channelName, NotificationMessage $message): void
        {
            if (!isset($this->channels[$channelName])) {
                throw new InvalidArgumentException("Provider not registered: $channelName");
            }

            $this->channels[$channelName]->send($message);
        }
    
    }
