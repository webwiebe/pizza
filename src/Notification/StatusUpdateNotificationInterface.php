<?php

namespace App\Notification;

use App\Entity\PizzaOrder;

interface StatusUpdateNotificationInterface
{
    public function notify(PizzaOrder $order): void;
    public function supports(string $method): bool;
}