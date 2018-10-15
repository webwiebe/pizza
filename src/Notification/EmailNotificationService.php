<?php

namespace App\Notification;

use App\Entity\PizzaOrder;

class EmailNotificationService implements StatusUpdateNotificationInterface
{
    public function notify(PizzaOrder $order): void
    {
        // do something
    }

    public function supports(string $method): bool
    {
        return \strtolower($method) === 'email';
    }
}