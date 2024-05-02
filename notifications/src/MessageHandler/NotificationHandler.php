<?php
// src/MessageHandler/NotificationHandler.php
namespace App\MessageHandler;

use App\Message\UserCreatedEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Psr\Log\LoggerInterface;

class NotificationHandler
{
    public function __invoke(UserCreatedEvent $message, LoggerInterface $logger)
    {
        // Save data into a log file
        // Code for logging data goes here
        $logger->info('User created successfully');
        $logger->info($message);
    }
}