<?php

namespace App\Repository;

use App\Entity\PizzaOrder;

class FileStorageOrderRepository implements OrderStorageInterface
{
    public function save(PizzaOrder $order): void
    {
        $serialized = \file_get_contents('orders.dat');
        $allOrders  = \unserialize($serialized);

        $allOrders[] = $order;

        $fh = \fopen('orders.dat', 'w+');

        \fwrite($fh, \serialize($allOrders));
    }

    /**
     * @return PizzaOrder[]
     */
    public function getAllOrders(): ?array
    {
        $serialized = \file_get_contents('orders.serialized');
        return \unserialize($serialized);
    }
}
